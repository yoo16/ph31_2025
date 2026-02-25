// DOM要素の取得
const localVideo = document.getElementById('localVideo');
const remoteVideo = document.getElementById('remoteVideo');
const startBtn = document.getElementById('startBtn');
const videoToggleBtn = document.getElementById('videoToggleBtn');
const audioBtn = document.getElementById('audioBtn');
const logContainer = document.getElementById('log-container');
const connStateDisplay = document.getElementById('conn-state');
const chatMessages = document.getElementById('chat-messages');
const chatForm = document.getElementById('chat-form');
const chatInput = document.getElementById('chat-input');
const statusLocal = document.getElementById('status-local');
const statusRemote = document.getElementById('status-remote');

// 変数定義
let localStream, pc;

// WebSocketの接続
const socket = new WebSocket('ws://localhost:8080/chat');
// STUNサーバーの設定:WebRTCの通信経路を確立するためのサーバー
const config = { iceServers: [{ urls: 'stun:stun.l.google.com:19302' }] };

// ログ表示
function addLog(msg) {
    const div = document.createElement('div');
    div.textContent = `[${new Date().toLocaleTimeString()}] ${msg}`;
    logContainer.appendChild(div);
    logContainer.scrollTop = logContainer.scrollHeight;
}

// チャット表示
function addChatMessage(sender, text) {
    const div = document.createElement('div');
    div.className = sender === 'Me' ? 'text-right' : 'text-left';
    div.innerHTML = `<span class="inline-block px-3 py-1 rounded-lg ${sender === 'Me' ? 'bg-blue-100 text-blue-800' : 'bg-gray-200 text-gray-800'}"><small class="block text-[10px] opacity-50">${sender}</small>${text}</span>`;
    chatMessages.appendChild(div);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// ローカルストリームの開始
async function startLocalStream() {
    if (!localStream) {
        try {
            // TODO: ローカルストリームの取得
            localStream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
            const audioTrack = localStream.getAudioTracks()[0];
            if (audioTrack) {
                audioTrack.enabled = false;
            }
            localVideo.srcObject = localStream;

            addLog('Media started (Audio initial OFF).');
        } catch (e) { addLog('Media Error: ' + e.message); }
    }
}
// PeerConnectionの作成
function createPeerConnection() {
    if (pc) { pc.close(); pc = null; }
    // PeerConnectionの作成: WebRTCの通信経路を確立
    pc = new RTCPeerConnection(config);
    addLog('PeerConnection Created.');

    // 接続状態の変化を監視
    pc.onconnectionstatechange = () => {
        connStateDisplay.textContent = pc.connectionState;
        if (pc.connectionState === 'connected') setBtnState(true);
        if (['disconnected', 'failed', 'closed'].includes(pc.connectionState)) stopCall(false);
    };

    // ICE候補の生成
    pc.onicecandidate = e => {
        // Candidate: ICE候補1
        if (e.candidate) socket.send(JSON.stringify({ candidate: e.candidate }));
    };

    // RTCPeerConnectionのトラック受信
    pc.ontrack = e => {
        // TODO: RemoteVideo: 受信したメディアストリーム
        remoteVideo.muted = false;
        remoteVideo.srcObject = e.streams[0];
        statusRemote.textContent = "相手: 接続中";
    };

    // 自分のメディアストリームを接続
    if (localStream) {
        localStream.getTracks().forEach(track => pc.addTrack(track, localStream));
    }
}

// ボタンの状態を更新
function setBtnState(isCalling) {
    if (isCalling) {
        startBtn.textContent = 'ビデオ通話終了';
        startBtn.classList.replace('bg-blue-600', 'bg-red-600');
    } else {
        startBtn.textContent = 'ビデオ通話';
        startBtn.classList.replace('bg-red-600', 'bg-blue-600');
    }
}

// 通話を終了
function stopCall(sendSignal = true) {
    if (pc) { pc.close(); pc = null; }
    remoteVideo.srcObject = null;
    statusRemote.textContent = "相手: 待機中";
    setBtnState(false);
    if (sendSignal) socket.send(JSON.stringify({ type: 'hangup' }));
    addLog('Call Stopped.');
}

// TODO: シグナリングサーバーからのメッセージを処理
socket.onmessage = async (e) => {
    const data = JSON.parse(e.data);
    if (data.chat) return addChatMessage('Friend', data.chat);
    if (data.type === 'hangup') return stopCall(false);

    // シグナリングサーバーからのメッセージを処理
    if (data.sdp) {
        // offer
        if (data.sdp.type === 'offer') createPeerConnection();

        // answer
        await pc.setRemoteDescription(new RTCSessionDescription(data.sdp));
        if (data.sdp.type === 'offer') {
            const answer = await pc.createAnswer();
            await pc.setLocalDescription(answer);
            socket.send(JSON.stringify({ sdp: pc.localDescription }));
        }
    } else if (data.candidate && pc) {
        await pc.addIceCandidate(new RTCIceCandidate(data.candidate)).catch(console.error);
    }
};

// 通話開始/終了
startBtn.onclick = async () => {
    if (pc && pc.connectionState === 'connected') {
        stopCall();
    } else {
        await startLocalStream();
        // PeerConnectionの作成
        createPeerConnection();

        // offerの作成
        const offer = await pc.createOffer();
        await pc.setLocalDescription(offer);

        // TODO: WebSocketで相手に offer を送信
        socket.send(JSON.stringify({ sdp: pc.localDescription }));
        setBtnState(true);
    }
};

// 音声ON/OFF
audioBtn.onclick = () => {
    if (!localStream) return;
    const audioTrack = localStream.getAudioTracks()[0];
    if (audioTrack) {
        audioTrack.enabled = !audioTrack.enabled;
        const span = audioBtn.querySelector('span');

        if (audioTrack.enabled) {
            span.textContent = '音声ON';
            audioBtn.classList.replace('bg-gray-600', 'bg-green-600');
            audioBtn.classList.replace('hover:bg-gray-700', 'hover:bg-green-700');
            addLog('Mic Enabled');
        } else {
            span.textContent = '音声OFF';
            audioBtn.classList.replace('bg-green-600', 'bg-gray-600');
            audioBtn.classList.replace('hover:bg-green-700', 'hover:bg-gray-700');
            addLog('Mic Disabled');
        }
    }
};

// チャット
chatForm.onsubmit = e => {
    e.preventDefault();
    const msg = chatInput.value.trim();
    if (msg) {
        // TODO: WebSocketで相手に chat を送信
        // socket.send(JSON.stringify({ chat: msg }));
        // addChatMessage('Me', msg);
        // chatInput.value = '';
    }
};

// ビデオのON/OFF制御
videoToggleBtn.onclick = () => {
    if (!localStream) return;

    // ローカル映像のトラックを取得
    const videoTrack = localStream.getVideoTracks()[0];
    if (videoTrack) {
        // 有効・無効を反転
        videoTrack.enabled = !videoTrack.enabled;

        // UI表示の切り替え
        if (videoTrack.enabled) {
            videoToggleBtn.textContent = 'カメラON';
            videoToggleBtn.classList.replace('bg-gray-600', 'bg-green-600');
            localVideo.style.opacity = "1"; // 自分の画面を表示
            addLog('Video Enabled');
        } else {
            videoToggleBtn.textContent = 'カメラOFF';
            videoToggleBtn.classList.replace('bg-green-600', 'bg-gray-600');
            localVideo.style.opacity = "0.3"; // 自分の画面を暗くしてOFF感を出す
            addLog('Video Disabled');
        }
    }
};

// ローカルストリームの開始
startLocalStream();
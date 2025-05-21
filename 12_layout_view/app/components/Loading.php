<div id="modal-loading" class="hidden fixed z-10 inset-0 overflow-y-auto flex items-center justify-center">
    <div class="fixed inset-0 bg-white bg-opacity-75 flex items-center justify-center">
        <div class="w-20 h-20">
            <img src="svg/loading.svg" alt="">
        </div>
    </div>
</div>

<script>
    function showLoading() {
        const loadingModal = document.getElementById('modal-loading');
        loadingModal.classList.remove('hidden');
        setTimeout(() => {
            loadingModal.classList.add('hidden');
        }, 2000);
    }
</script>
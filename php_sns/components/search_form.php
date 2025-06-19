<!-- home/search/index.php に keyword をGET送信 -->
<form action="home/search/" method="get" class="space-x-2 p-4 bg-white rounded-lg mt-2">
    <input
        type="text"
        name="keyword"
        value="<?= $keyword ?? '' ?>"
        placeholder="キーワードを入力"
        class="flex-grow px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
    <button
        type="submit"
        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
        検索
    </button>
</form>
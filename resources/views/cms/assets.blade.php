@vite(['resources/js/cms/editor.js'])
<script>
    // Ensure Lucide icons are initialized for the toolbar if not already
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>

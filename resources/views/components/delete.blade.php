<div>
    <h3>Delete Confirmation</h3>
    <p>Are you sure you want to delete this item?</p>
    <button type="button" onclick="confirmDelete()">Confirm Delete</button>
    <button type="button" onclick="cancelDelete()">Cancel</button>
</div>

<script>
    function confirmDelete() {
        // Logic for confirming the delete action
        alert('Item deleted!');
    }

    function cancelDelete() {
        // Logic for canceling the delete action
        alert('Delete canceled.');
    }
</script>

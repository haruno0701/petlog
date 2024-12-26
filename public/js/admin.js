function deleteItem(itemId){
    if (confirm('本当に削除しますか。')) {
        location.href = "/admin/pet/delete?id=" + itemId; 
    }
}
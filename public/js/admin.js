function deleteItem(itemId){
    if (confirm('本当に削除しますか。')) {
        location.href = "/admin/pet/delete?id=" + itemId; 
    }
}

function deleteWeight(itemId){
    if (confirm('本当に削除しますか。')) {
        location.href = "/admin/weight/delete?id=" + itemId; 
    }
}
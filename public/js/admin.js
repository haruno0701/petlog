function deleteItem(itemId){
    if (confirm('本当に削除しますか。')) {
        location.href = "/admin/pet/delete?id=" + itemId; 
    }
}

function deleteWeight(itemId){
    if (confirm('本当に削除しますか。')) {
        // window.location.replace("/admin/weight/delete?id=" + itemId)
        window.removeEventListener('beforeunload', beforeUnloadHandler);
        window.location.href = "/admin/weight/delete?id=" + itemId; 
    }
}

function deleteTemperature(itemId){
    if (confirm('本当に削除しますか。')) {
        window.removeEventListener('beforeunload', beforeUnloadHandler);
        window.location.href = "/admin/temperature/delete?id=" + itemId; 
    }   
    
}
function deleteStroll(itemId){
    if (confirm('本当に削除しますか。')) {
        window.removeEventListener('beforeunload', beforeUnloadHandler);
        window.location.href = "/admin/stroll/delete?id=" + itemId; 
    } 
      
    
}
function deleteUrine(itemId){
    if (confirm('本当に削除しますか。')) {
        window.removeEventListener('beforeunload', beforeUnloadHandler);
        window.location.href = "/admin/urine/delete?id=" + itemId; 
    } 
      
    
}
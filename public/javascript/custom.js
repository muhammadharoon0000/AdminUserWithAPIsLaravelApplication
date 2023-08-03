console.log("Working");
let table = new DataTable('#myTable');
let table2 = new DataTable('#myTable2');
$(document).ready(function(){
    
    var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
       removeItemButton: true,
       maxItemCount:10,
       searchResultLimit:5,
       renderChoiceLimit:10
     }); 
    
    
});
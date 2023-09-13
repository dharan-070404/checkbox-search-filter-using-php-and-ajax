$(document).ready(function(){
    // Call the function to initialize the page
    filterSearch();

    // When any checkbox is clicked, trigger the filterSearch function
    $('.productDetail').click(function(){
        filterSearch();
    });

    // When a department checkbox is clicked, update document type checkboxes
});


// Function to perform the filter search
function filterSearch() {
    $('.searchResult').html('<div id="loading">Loading .....</div>');
    var action = 'fetch_data';
    var dept = getFilterData('dept');  // Replace 'dept' with the actual ID or class of your department checkboxes
    var doc_type = getFilterData('doc_type');  // Replace 'doc_type' with the actual ID or class of your doc type checkboxes
    var ctg = getFilterData('ctg');  // Replace 'ctg' with the actual ID or class of your category checkboxes
    
    $.ajax({
        url: "action.php",
        method: "POST",
        dataType: "json",
        data:{action:action,dept:dept,doc_type:doc_type,ctg:ctg},
        success: function(data){
            $('.searchResult').html(data.html);
        }
    });
}

// Function to get selected checkbox values
function getFilterData(className) {
    var filter = [];
    $('.' + className + ':checked').each(function(){
        filter.push($(this).val());
    });
    return filter;
}

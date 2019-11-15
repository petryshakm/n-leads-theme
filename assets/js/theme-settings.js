jQuery(document).ready(function($) {
    //--------------------------form prevent submit
    $('.search-form').submit(function(event) {
        event.preventDefault();
    });
    //--------------------------search
    $('.search-value-input').keyup(function(event) {
        var searchedValue = $(this).val().toLowerCase();
        $('.table-leads-wrapper tbody tr').each(function(index, el) {
            var currentRowText = $(this).text();
            currentRowTextLower = currentRowText.toLowerCase();
            if (currentRowTextLower.indexOf(searchedValue) == -1) {
                $(this).addClass('hide-tr');
            } else {
                $(this).removeClass('hide-tr');
            }
        });
    });
  
}); // dom ready
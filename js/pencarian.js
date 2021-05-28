$(document).ready(function(){
    function removeHighlighting(highlightedElements){
        highlightedElements.each(function(){
            var element = $(this);
            element.replaceWith(element.html());
        })
    }

    function addHighlighting(element, textToHighlight){
        var text = element.text();
        var highlightedText = '<em>' + textToHighlight + '</em>';
        var newText = text.replace(textToHighlight, highlightedText);

        element.html(newText);
    }

    $("#cari").on("keyup", function() {
        var value = $(this).val();

        removeHighlighting($("table tr em"));

        $("table tr").each(function(index) {
            if (index !== 0) {
                $row = $(this);

                var $tdElement = $row.find("td:first");
                var id = $tdElement.text();
                var matchedIndex = id.indexOf(value);

                if (matchedIndex != 0) {
                    $row.hide();
                }
                else {
                    addHighlighting($tdElement, value);
                    $row.show();
                }
            }
        });
    });
});

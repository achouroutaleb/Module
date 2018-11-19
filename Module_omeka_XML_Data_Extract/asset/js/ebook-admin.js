// Kept for compatibility with Omeka < 1.2.
Omeka.PDFDocManageSelectedActions = function() {
    var selectedOptions = $('[value="update-selected"], [value="delete-selected"], #batch-form .batch-inputs .batch-selected');
    if ($('.batch-edit td input[type="checkbox"]:checked').length > 0) {
        selectedOptions.removeAttr('disabled');
    } else {
        selectedOptions.attr('disabled', true);
        $('.batch-actions-select').val('default');
        $('.batch-actions .active').removeClass('active');
        $('.batch-actions .default').addClass('active');
    }
};

(function($, window, document) {
    $(function() {

        var batchSelect = $('#batch-form .batch-actions-select');
        batchSelect.append(
            $('<option class="batch-selected" disabled="disabled"></option>').val('PDFDoc-selected').html(Omeka.jsTranslate('Create PDFDoc with selected'))
        );
        batchSelect.append(
            $('<option></option>').val('PDFDoc-all').html(Omeka.jsTranslate('Create PDFDoc with all'))
        );
        var batchActions = $('#batch-form .batch-actions');
        batchActions.append(
            $('<input type="submit" class="PDFDoc-selected" formaction="PDFDoc">').val(Omeka.jsTranslate('Go'))
        );
        batchActions.append(
            $('<input type="submit" class="PDFDoc-all" formaction="PDFDoc">').val(Omeka.jsTranslate('Go'))
        );
        var resourceType = window.location.pathname.split('/').pop();
        batchActions.append(
            $('<input type="hidden" name="resource_type">').val(resourceType)
        );

        // Kept for compatibility with Omeka < 1.2.
        $('.select-all').change(function() {
            Omeka.PDFDocManageSelectedActions();
        });
        $('.batch-edit td input[type="checkbox"]').change(function() {
            Omeka.PDFDocManageSelectedActions();
        });

        // For the page admin site navigation.
        $('body.sites.edit #page-actions').prepend(
            $('<a class="button"></a>')
                .prop('href', window.location.pathname.substr(0, window.location.pathname.lastIndexOf('/')) + '/PDFDoc')
                .html(Omeka.jsTranslate('Create PDFDoc'))
        );
    });
}(window.jQuery, window, document));

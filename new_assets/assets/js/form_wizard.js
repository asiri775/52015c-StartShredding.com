/* ============================================================
 * Form Wizard
 * Multistep form wizard using Bootstrap Wizard Plugin
 * For DEMO purposes only. Extract what you need.
 * ============================================================ */
(function($) {

    'use strict';

    $(document).ready(function() {

        $('#rootwizard').bootstrapWizard({
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index + 1;

                // If it's the last tab then hide the last button and show the finish instead
                if ($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show().removeClass('disabled hidden');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }

                var li = navigation.find('li a.active').parent();

                var btnNext = $('#rootwizard').find('.pager .next').find('button');
                var btnPrev = $('#rootwizard').find('.pager .previous').find('button');

                // remove fontAwesome icon classes
                function removeIcons(btn) {
                    btn.removeClass(function(index, css) {
                        return (css.match(/(^|\s)fa-\S+/g) || []).join(' ');
                    });
                }

                if ($current > 1 && $current < $total) {

                    var nextIcon = li.next().find('.fa');
                    var nextIconClass = nextIcon.attr('class').match(/fa-[\w-]*/).join();

                    removeIcons(btnNext);
                    btnNext.addClass(nextIconClass + ' btn-animated from-left fa');

                    var prevIcon = li.prev().find('.fa');
                    var prevIconClass = prevIcon.attr('class').match(/fa-[\w-]*/).join();

                    removeIcons(btnPrev);
                    btnPrev.addClass(prevIconClass + ' btn-animated from-left fa');
                } else if ($current == 1) {
                    // remove classes needed for button animations from previous button
                    btnPrev.removeClass('btn-animated from-left fa');
                    removeIcons(btnPrev);
                } else {
                    // remove classes needed for button animations from next button
                    btnNext.removeClass('btn-animated from-left fa');
                    removeIcons(btnNext);
                }
            },
            onNext: function(tab, navigation, index) {
                console.log("Showing next tab");
                if(index == 1){
                    console.log("1");
                    var client_info = $('.client_info');
                    var val_flag = 1;
                    for(var i = 0; i < client_info.length; i++){
                        if(client_info[i].value == ""){
                            val_flag = 0;
                            break;
                        }
                    }
                    if(val_flag == 0){
                        alert("Please complete the form");
                        return false;
                    }
                    else {

                        $('#form_companyName').val($('#companyName').val());
                        $('#form_contactName').val($('#contactName').val());
                        $('#form_phone').val($('#phone').val());
                        $('#form_bill-firstName').val($('#bill-firstName').val());
                        $('#form_bill-city').val($('#bill-city').val());
                        $('#form_bill-postal').val($('#bill-postal').val());
                        $('#form_email').val($('#email').val());
                        $('#form_bill-lastName').val($('#bill-lastName').val());
                        $('#form_bill-phoneNumber').val($('#bill-phoneNumber').val());
                        $('#form_bill-email').val($('#bill-email').val());
                        $('#form_shipp-firstName').val($('#shipp-firstName').val());
                        $('#form_shipp-lastName').val($('#shipp-lastName').val());
                        $('#form_shipp-city').val($('#shipp-city').val());
                        $('#form_shipp-state').val($('#shipp-state').val());
                        $('#form_shipp-postal').val($('#shipp-postal').val());
                        $('#form_shipp-phoneNumber').val($('#shipp-phoneNumber').val());
                        $('#form_shipp-email').val($('#shipp-email').val());
                        $('#form_operation_from').val($('#operation_from').val());
                        $('#form_operation_to').val($('#operation_to').val());
                        $('#form_makeitcount').val($('#makeitcount').val());
                        
                    }
                    $('#checkbox-agree-valid').html('');
                }
                else if(index==2 && $('#checkbox-agree').is(':checked') == false){
                    $('#checkbox-agree-valid').html('<span class="text-danger">Required</span>');
                    return false;
                }
                else{
                    $('#checkbox-agree-valid').html('');
                }
                if($('#checkbox-agree').is(':checked') == true){
                    $('#form_terms_accepted').val("1");
                }
            },
            onPrevious: function(tab, navigation, index) {
                console.log("Showing previous tab");
            },
            onInit: function() {
                $('#rootwizard ul').removeClass('nav-pills');
            }

        });

        $('.remove-item').click(function() {
            $(this).parents('tr').fadeOut(function() {
                $(this).remove();
            });
        });

    });

})(window.jQuery);
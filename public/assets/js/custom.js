// Add an event listener to the radio buttons to toggle the visibility of the fields
const servicesFields = document.getElementById('servicesFields');
const productsFields = document.getElementById('productsFields');
const serviceRadio = document.querySelector('input[name="service_or_product"][value="services"]');
const productRadio = document.querySelector('input[name="service_or_product"][value="products"]');

if (serviceRadio !== null) {
    serviceRadio.addEventListener('change', () => {
        if (serviceRadio.checked) {
            servicesFields.style.display = 'block';
            productsFields.style.display = 'none';
        }
    });
}

if (productRadio !== null) {
    productRadio.addEventListener('change', () => {
        if (productRadio.checked) {
            productsFields.style.display = 'block';
            servicesFields.style.display = 'none';
        }
    });
}

// Service drop down selection
document.addEventListener("DOMContentLoaded", function () {
    const categoryDropdown = document.getElementById("categoryDropdown");

    const subcategoryDropdown = document.getElementById("subCategoryDropdown");

    const otherSubcategoryInputContainer = document.getElementById("otherSubcategoryInputContainer");
    const otherSubcategoryInput = document.getElementById("otherSubcategoryInput");
    if(subcategoryDropdown !== null){
        subcategoryDropdown.addEventListener("change", function () {
            const selectedSubcategoryId = this.value;
    
            if (selectedSubcategoryId === "100") {
                otherSubcategoryInputContainer.style.display = "block";
            } else {
                otherSubcategoryInputContainer.style.display = "none";
                otherSubcategoryInput.value = "";
            }
        });
    }
    if(categoryDropdown !== null)
    {
        categoryDropdown.addEventListener("change", function () {
            const selectedCategoryId = this.value;
    
            // Clear the subcategory dropdown
            subcategoryDropdown.innerHTML = '';
    
            if (selectedCategoryId) {
                // Fetch subcategories based on the selected category via AJAX
                fetch(`/sevice-categories/${selectedCategoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subcategory => {
    
    
                            subcategoryDropdown.innerHTML += `<option value="${subcategory.service_id}">${subcategory.service_desc}</option>`;
                        });
                        subcategoryDropdown.innerHTML += '<option value="100">Other</option>';
                    })
                    .catch(error => {
                        console.error("Error fetching subcategories:", error);
                    });
            }
        });
    }


});

// Product Dropdown selection
document.addEventListener("DOMContentLoaded", function () {
    const categoryDropdown = document.getElementById("productCategoryDropdown");

    const subcategoryDropdown = document.getElementById("subProductCategoryDropdown");

    const otherSubcategoryInputContainer = document.getElementById("otherSubProductcategoryInputContainer");
    const otherSubcategoryInput = document.getElementById("otherProductSubcategoryInput");
    if(subcategoryDropdown !== null){
        subcategoryDropdown.addEventListener("change", function () {
            const selectedSubcategoryId = this.value;
    
            if (selectedSubcategoryId === "100") {
                otherSubcategoryInputContainer.style.display = "block";
            } else {
                otherSubcategoryInputContainer.style.display = "none";
                otherSubcategoryInput.value = "";
            }
        });
    }
    if(categoryDropdown !== null){
        categoryDropdown.addEventListener("change", function () {
            const selectedCategoryId = this.value;
            // Clear the subcategory dropdown
            subcategoryDropdown.innerHTML = '';
    
            if (selectedCategoryId) {
                // Fetch subcategories based on the selected category via AJAX
                fetch(`/get-subcategories/${selectedCategoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subcategory => {
    
                            subcategoryDropdown.innerHTML += `<option value="${subcategory.product_id}">${subcategory.product_desc}</option>`;
                        });
                        subcategoryDropdown.innerHTML += '<option value="100">Other</option>';
                    })
                    .catch(error => {
                        console.error("Error fetching subcategories:", error);
                    });
            }
        });
    }


});

/* Alert message */
function hideSuccessAlert() {
    var alert = document.getElementById('success-alert');
    if (alert) {
        setTimeout(function () {
            alert.style.opacity = '0';
            setTimeout(function () {
                alert.style.display = 'none';
            }, 500);
        }, 2000);
    }
}
hideSuccessAlert();
/* END */

/* Alert message */
function hideSuccessAlert() {
    var alert = document.getElementById('success-alert');
    if (alert) {
        setTimeout(function () {
            alert.style.opacity = '0';
            setTimeout(function () {
                alert.style.display = 'none';
            }, 500);
        }, 2000);
    }
}
hideSuccessAlert();
/* END */


$(document).on('click', '.delete', function () {
    var clientId = $(this).data('client_experience_id');
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    if (confirm("Are you sure you want to delete this record?")) {
        $.ajax({
            type: "DELETE",
            url: '/deleteExp/' + clientId,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.message,
                });
                location.reload();
            },
            error: function (data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message,
                });
            }
        });
    }
});



// 

$(document).on('click', '.edit', function () {
    var clientExperienceId = $(this).data('client_experience_id');
    $.ajax({
        url: '/editExp/' + clientExperienceId,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#client_name').val(data.client_name);
            $('#project_title').val(data.project_title);
            $('#description').val(data.description);
            $('#highlights').val(data.highlights);
            $('#project_size').val(data.project_size);
            $('#project_size_currency').val(data.project_size_currency);
            $('#project_duration_in_year').val(data.project_duration_in_year);
            $('#project_duration_in_month').val(data.project_duration_in_month);
            $('#update-button').attr('data-id', clientExperienceId);
            //$('#update-form').attr('action', '/update-client-experience/' + clientExperienceId);
        }
    });
});


$(document).on('click', '#update-button', function (e) {
    e.preventDefault();
    var token = $("meta[name='csrf-token']").attr('content');
    var client_experience_id = $(this).data('id');
    var client_name = $('#client_name').val();
    var project_title = $('#project_title').val();
    var description = $('#description').val();
    var highlights = $('#highlights').val();
    var project_size = $('#project_size').val();
    var project_size_currency = $('#project_size_currency').val();
    var project_duration_in_year = $('#project_duration_in_year').val();
    var project_duration_in_month = $('#project_duration_in_month').val();
    $.ajax({
        url: '/update-client-experience/' + client_experience_id,
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'POST',
        data: {
            _token: token,
            client_experience_id: client_experience_id,
            client_name: client_name,
            project_title: project_title,
            description: description,
            highlights: highlights,
            project_size: project_size,
            project_size_currency: project_size_currency,
            project_duration_in_year: project_duration_in_year,
            project_duration_in_month: project_duration_in_month

        },
        success: function (data) {
            var jsonObj = JSON.parse(JSON.stringify(data));
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: jsonObj.message,
            });

            // return false;
        },
        error: function (data) {
            var jsonObj = JSON.parse(JSON.stringify(data));
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: jsonObj.message,
            });
            // return false;                 
        }
    });
    // return false;
});


function resendOTP() {
    fetch('/resendOtp', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())
        .then(data => {

            if (data.status === 'success') {

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: data.message,
                });

            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message,
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}


function fetchQuestions(selectedTopicId) {
    var token = $("meta[name='csrf-token']").attr('content');
    var form = $('form');
    form.find('.question-card').remove(); // Remove existing question cards.
    var questionNumber = 1;

    if (selectedTopicId) {
        $.ajax({
            url: '/get-questions',
            headers: {
                'X-CSRF-TOKEN': token
            },
            method: 'POST',
            data: {
                _token: token,
                topic_id: selectedTopicId
            },
            success: function (data) {
                console.log('data', data)
                var jsonObj = JSON.parse(JSON.stringify(data));
                var card = '';

                var success = jsonObj.success;
                if (success) {
                    var quiz = jsonObj.questions;

                    $.each(quiz, function (key, val) {
                        var div = "<div class='question-card' data-question-type='" + val['type'] + "'>";
                        div += "<br>";
                        div += "<div><strong style='color: white;'>" + questionNumber + " ) </strong> " + val['question'] + "</div>";

                        div += "<input type='hidden' name='question_id' value='" + val['question_id'] + "' />";
                        div += "<input type='hidden' name='question' value='" + val['question'] + "' />";

                        if (val['type'] == 'radio') {
                            $.each(val['answers'], function (k, v) {
                                if (v['answer'] === 'Yes') {
                                    div += "<input type='radio' name='yes" + val['question_id'] + "' value='yes' id='radio-yes-" + val['question_id'] + "' />";
                                    div += "<label for='radio-yes-" + val['question_id'] + "'>Yes</label>";
                                } else {
                                    div += "<input type='radio' name='yes" + val['question_id'] + "' value='" + v['answers_id'] + "' id='radio-no-" + val['question_id'] + "' />";
                                    div += "<label for='radio-no-" + val['question_id'] + "'>" + v['answer'] + "</label>";
                                }
                                div += "<br>";
                            });

                            // Add the text box after the line break to position it below the radio buttons.
                            div += "<input type='text' class='form-control' name='question" + val['question_id'] + "-text' placeholder='Please specify' id='text-yes-" + val['question_id'] + "' style='display:none;' />";

                            // Add change event handlers to show/hide the text box based on the selected radio button.
                            div += "<script>$('#radio-yes-" + val['question_id'] + ", #radio-no-" + val['question_id'] + "').on('change', function() {";
                            div += "if ($('#radio-yes-" + val['question_id'] + "').is(':checked')) {";
                            div += "$('#text-yes-" + val['question_id'] + "').show();";
                            div += "} else {";
                            div += "$('#text-yes-" + val['question_id'] + "').hide();";
                            div += "}";
                            div += "});</script>";
                            div += "<br>";
                        }
                        else if (val['type'] == 'radioButton') {
                            $.each(val['answers'], function (k, v) {
                                if (v['answer'] === 'Others') { // Checking for 'Others' option
                                    div += "<input type='radio' name='radioYes" + val['question_id'] + "' value='others' id='radio-others-" + val['question_id'] + "' />";
                                    div += "<label for='radio-others-" + val['question_id'] + "'>Others</label>";
                                } else {
                                    div += "<input type='radio' name='radioYes" + val['question_id'] + "' value='" + v['answers_id'] + "' id='radio-no-" + val['question_id'] + "' />";
                                    div += "<label for='radio-no-" + val['question_id'] + "'>" + v['answer'] + "</label>";
                                }
                                div += "<br>";
                            });

                            // Add the text box for 'Others' after the line break to position it below the radio buttons.
                            div += "<input type='text' class='form-control' name='question" + val['question_id'] + "-text' placeholder='Please specify' id='text-others-" + val['question_id'] + "' style='display:none;' />";

                            // Add change event handlers to show/hide the text box based on the selected radio button.
                            div += "<script>$('#radio-others-" + val['question_id'] + ", #radio-no-" + val['question_id'] + "').on('change', function() {";
                            div += "if ($('#radio-others-" + val['question_id'] + "').is(':checked')) {";
                            div += "$('#text-others-" + val['question_id'] + "').show();";
                            div += "} else {";
                            div += "$('#text-others-" + val['question_id'] + "').hide();";
                            div += "}";
                            div += "});</script>";

                        }

                        else if (val['type'] == 'checkbox') {
                            $.each(val['answers'], function (k, v) {
                                div += "<input  type='checkbox' name='question" + val['question_id'] + "' value='" + v['answers_id'] + "' /><label>" + v['answer'] + "</label>";
                                div += "<br>";
                            });
                        } else if (val['type'] == 'textbox') {
                            div += "<label for='employeeCommuting'>Employee Commuting (if applicable):</label>";
                            div += "<input class='form-control' type='text' id='employeeCommuting' name='employeeCommuting' /><br>";
                            div += "<label for='companyFleet'>Company Fleet (if applicable):</label>";
                            div += "<input class='form-control' type='text' id='companyFleet' name='companyFleet' /><br>";
                        }

                        else if (val['type'] == 'select') {
                            div += "<select class='form-select' aria-label='Default select example'>";
                            div += "<option selected>--Select--</option>";

                            $.each(val['answers'], function (k, v) {
                                div += "<option value='" + v['answers_id'] + "'>" + v['answer'] + "</option>";
                            });

                            div += "</select>";
                        }
                        else {
                            div += "<input class='form-control' name='textbox' type='text' placeholder='Enter Your Answer'>";
                            div += "<br>";
                        }
                        div += "</div>";
                        card += div;
                        questionNumber++;
                    });

                    form.append(card); // Append the generated card HTML to the form
                }

                // Remove any existing submit button.
                form.find('button[type="submit"]').remove();

                // Add a submit button.
                var submitButton = $('<button>')
                    .addClass('btn btn-primary')
                    .attr('type', 'submit')
                    .text('Submit');
                form.append(submitButton);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    } else {
        form.find('.question-card').remove();
        form.find('button[type="submit"]').remove();
    }

    form.on('submit', function (event) {
        var token = $("meta[name='csrf-token']").attr('content');
        event.preventDefault();

        var formData = [];

        // Loop through each question card
        $('.question-card').each(function () {
            var questionData = {};
            questionData.question_id = $(this).find('input[name="question_id"]').val();
            questionData.question = $(this).find('input[name="question"]').val();

            questionData.anyTopic = selectedTopicId;

            // Differentiate between question types and select the answer accordingly
            var questionType = $(this).data('question-type');
            questionData.questionType = questionType;

            if (questionType === 'radio') {
                // questionData.answer = $(this).find('input[name^="yes"]').filter(':checked').val() || '';
                var selectedValue = $(this).find('input[name^="yes"]').filter(':checked').val();
                questionData.answer = (selectedValue === 'yes') ? 'yes' : 'no';
            } else if (questionType === 'radioButton') {
                // questionData.answer = $(this).find('input[name^="radioYes"]').filter(':checked').val() || '';
                var selectedValue = $(this).find('input[name^="radioYes"]').filter(':checked').val();
                var selectedLabel = $(this).find('input[name^="radioYes"]').filter(':checked').next('label').text();
                questionData.answer = (selectedValue === 'others') ? 'Others' : selectedLabel;
            } else if (questionType === 'checkbox') {
                var answers = [];
                $(this).find('input[name^="question"]').filter(':checked').each(function () {
                    var label = $(this).next('label').text();
                    answers.push(label);
                });
                questionData.answer = answers;
            }
            else {
                // Handle other question types here
            }
            questionData.textbox = $(this).find('input[name ="textbox"]').val() || '';
            questionData.text = $('input[name="question' + questionData.question_id + '-text"]').val() || '';
            questionData.employeeCommuting = $(this).find('input[name="employeeCommuting"]').val();
            questionData.companyFleet = $(this).find('input[name="companyFleet"]').val();
            formData.push(questionData);
        });
        console.log('formatData', formData);
        // Send the structured form data to the server
        $.ajax({
            url: '/submit-answer',
            headers: {
                'X-CSRF-TOKEN': token
            },
            method: 'POST',
            data: {
                answers: JSON.stringify(formData)
            },
            success: function (response) {
                window.location.href = '/dashboard';
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });


}



function fetchQuestions2(selectedTopicId) {
    var token = $("meta[name='csrf-token']").attr('content');
    var form = $('.tab-content');
    form.find('.question-card').remove();
    form.find('.tab-body').html('');
    var questionNumber = 1;

    if (selectedTopicId) {
        $.ajax({
            url: '/get-questions',
            headers: {
                'X-CSRF-TOKEN': token
            },
            method: 'POST',
            data: {
                _token: token,
                topic_id: selectedTopicId
            },
            success: function (data) {
                console.log('data', data)
                var jsonObj = JSON.parse(JSON.stringify(data));
                var card = '';

                var success = jsonObj.success;
                if (success) {
                    var quiz = jsonObj.questions;

                    $.each(quiz, function (key, val) {
                        var div = "<div class='question-card' data-question-type='" + val['type'] + "'>";
                        div += "<br>";
                        div += "<div><strong style='color: white;'>" + questionNumber + " ) </strong> " + val['question'] + "</div>";

                        div += "<input type='hidden' name='question_id' value='" + val['question_id'] + "' />";
                        div += "<input type='hidden' name='question' value='" + val['question'] + "' />";

                        if (val['type'] == 'radio') {
                            $.each(val['answers'], function (k, v) {
                                if (v['answer'] === 'Yes') {
                                    div += "<input type='radio' name='yes" + val['question_id'] + "' value='yes' id='radio-yes-" + val['question_id'] + "' />";
                                    div += "<label for='radio-yes-" + val['question_id'] + "'>Yes</label>";
                                } else {
                                    div += "<input type='radio' name='yes" + val['question_id'] + "' value='" + v['answers_id'] + "' id='radio-no-" + val['question_id'] + "' />";
                                    div += "<label for='radio-no-" + val['question_id'] + "'>" + v['answer'] + "</label>";
                                }
                                div += "<br>";
                            });

                            // Add the text box after the line break to position it below the radio buttons.
                            div += "<input type='text' class='form-control' name='question" + val['question_id'] + "-text' placeholder='Please specify' id='text-yes-" + val['question_id'] + "' style='display:none;' />";

                            // Add change event handlers to show/hide the text box based on the selected radio button.
                            div += "<script>$('#radio-yes-" + val['question_id'] + ", #radio-no-" + val['question_id'] + "').on('change', function() {";
                            div += "if ($('#radio-yes-" + val['question_id'] + "').is(':checked')) {";
                            div += "$('#text-yes-" + val['question_id'] + "').show();";
                            div += "} else {";
                            div += "$('#text-yes-" + val['question_id'] + "').hide();";
                            div += "}";
                            div += "});</script>";
                            div += "<br>";
                        }
                        else if (val['type'] == 'radioButton') {
                            $.each(val['answers'], function (k, v) {
                                if (v['answer'] === 'Others') { // Checking for 'Others' option
                                    div += "<input type='radio' name='radioYes" + val['question_id'] + "' value='others' id='radio-others-" + val['question_id'] + "' />";
                                    div += "<label for='radio-others-" + val['question_id'] + "'>Others</label>";
                                } else {
                                    div += "<input type='radio' name='radioYes" + val['question_id'] + "' value='" + v['answers_id'] + "' id='radio-no-" + val['question_id'] + "' />";
                                    div += "<label for='radio-no-" + val['question_id'] + "'>" + v['answer'] + "</label>";
                                }
                                div += "<br>";
                            });

                            // Add the text box for 'Others' after the line break to position it below the radio buttons.
                            div += "<input type='text' class='form-control' name='question" + val['question_id'] + "-text' placeholder='Please specify' id='text-others-" + val['question_id'] + "' style='display:none;' />";

                            // Add change event handlers to show/hide the text box based on the selected radio button.
                            div += "<script>$('#radio-others-" + val['question_id'] + ", #radio-no-" + val['question_id'] + "').on('change', function() {";
                            div += "if ($('#radio-others-" + val['question_id'] + "').is(':checked')) {";
                            div += "$('#text-others-" + val['question_id'] + "').show();";
                            div += "} else {";
                            div += "$('#text-others-" + val['question_id'] + "').hide();";
                            div += "}";
                            div += "});</script>";

                        }

                        else if (val['type'] == 'checkbox') {
                            $.each(val['answers'], function (k, v) {
                                div += "<input  type='checkbox' name='question" + val['question_id'] + "' value='" + v['answers_id'] + "' /><label>" + v['answer'] + "</label>";
                                div += "<br>";
                            });
                        } else if (val['type'] == 'textbox') {
                            div += "<label for='employeeCommuting'>Employee Commuting (if applicable):</label>";
                            div += "<input class='form-control' type='text' id='employeeCommuting' name='employeeCommuting' /><br>";
                            div += "<label for='companyFleet'>Company Fleet (if applicable):</label>";
                            div += "<input class='form-control' type='text' id='companyFleet' name='companyFleet' /><br>";
                        }

                        else if (val['type'] == 'select') {
                            div += "<select class='form-select' aria-label='Default select example'>";
                            div += "<option selected>--Select--</option>";

                            $.each(val['answers'], function (k, v) {
                                div += "<option value='" + v['answers_id'] + "'>" + v['answer'] + "</option>";
                            });

                            div += "</select>";
                        }
                        else {
                            div += "<input class='form-control' name='textbox' type='text' placeholder='Enter Your Answer'>";
                            div += "<br>";
                        }
                        div += "</div>";
                        card += div;
                        questionNumber++;
                    });
                    $('#tab-body-' + selectedTopicId).html(card); // Append the generated card HTML to the form
                }

                // Remove any existing submit button.
                form.find('button[type="submit"]').remove();

                // Add a submit button.
                // var submitButton = $('<button>')
                //     .addClass('btn btn-primary')
                //     .attr('type', 'submit')
                //     .text('Submit');
                // $('#accordion-body-'+selectedTopicId).append(submitButton);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });

    }

    form.on('submit', function (event) {

        var token = $("meta[name='csrf-token']").attr('content');
        event.preventDefault();

        var formData = [];

        // Loop through each question card
        $('.question-card').each(function () {
            var questionData = {};
            questionData.question_id = $(this).find('input[name="question_id"]').val();
            questionData.question = $(this).find('input[name="question"]').val();

            questionData.anyTopic = selectedTopicId;

            // Differentiate between question types and select the answer accordingly
            var questionType = $(this).data('question-type');
            questionData.questionType = questionType;

            if (questionType === 'radio') {
                // questionData.answer = $(this).find('input[name^="yes"]').filter(':checked').val() || '';
                var selectedValue = $(this).find('input[name^="yes"]').filter(':checked').val();
                questionData.answer = (selectedValue === 'yes') ? 'yes' : 'no';
            } else if (questionType === 'radioButton') {
                // questionData.answer = $(this).find('input[name^="radioYes"]').filter(':checked').val() || '';
                var selectedValue = $(this).find('input[name^="radioYes"]').filter(':checked').val();
                var selectedLabel = $(this).find('input[name^="radioYes"]').filter(':checked').next('label').text();
                questionData.answer = (selectedValue === 'others') ? 'Others' : selectedLabel;
            } else if (questionType === 'checkbox') {
                var answers = [];
                $(this).find('input[name^="question"]').filter(':checked').each(function () {
                    var label = $(this).next('label').text();
                    answers.push(label);
                });
                questionData.answer = answers;
            }
            else {
                // Handle other question types here
            }
            questionData.textbox = $(this).find('input[name ="textbox"]').val() || '';
            questionData.text = $('input[name="question' + questionData.question_id + '-text"]').val() || '';
            questionData.employeeCommuting = $(this).find('input[name="employeeCommuting"]').val();
            questionData.companyFleet = $(this).find('input[name="companyFleet"]').val();
            formData.push(questionData);
        });
        console.log('formatData', formData);
        // Send the structured form data to the server
        $.ajax({
            url: '/submit-answer',
            headers: {
                'X-CSRF-TOKEN': token
            },
            method: 'POST',
            data: {
                answers: JSON.stringify(formData)
            },
            success: function (response) {
                window.location.href = '/dashboard';
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });



}

/* local storage and without local storage */
// function fetchQuestions3(selectedTopicId) {
//     var token = $("meta[name='csrf-token']").attr('content');
//     var form = $('.accordion-item');
//     form.find('.question-card').remove();
//     form.find('.accordion-body').html('');
//     var questionNumber = 1;
//     if (selectedTopicId) {
//         $.ajax({
//             url: '/get-questions',
//             headers: {
//                 'X-CSRF-TOKEN': token
//             },
//             method: 'POST',
//             data: {
//                 _token: token,
//                 topic_id: selectedTopicId
//             },
//             success: function (data) {
//                 var jsonObj = JSON.parse(JSON.stringify(data));
//                 var card = '';

//                 var success = jsonObj.success;
//                 if (success) {
//                     var quiz = jsonObj.questions;

//                     $.each(quiz, function (key, val) {
//                         console.log()

//                         var div = "<div class='question-card' data-question-type='" + val['type'] + "'>";
//                         div += "<br>";
//                         div += "<div><strong style='color: white;'>" + questionNumber + " ) </strong> " + val['question'] + "</div>";


//                         div += "<input type='hidden' name='question' value='" + val['question'] + "' />";
//                         div += "<input type='hidden' name='question_id' value='" + val['question_id'] + "' />";


//                         if (val['type'] == 'radio') {
//                             var rdhide = 'hide';
//                             var other = '';
//                             $.each(val['answers'], function (k, v) {
//                                 var rdcheck = (v['answer'].toLowerCase() == v['fill']) ? 'checked=checked' : '';
//                                 if (v['answer'] == 'Yes') {
//                                     rdhide = (v['answer'].toLowerCase() == v['fill']) ? '' : 'hide';
//                                     other = (v['answer'].toLowerCase() == v['fill']) ? v['other'] : '';
//                                     div += "<input type='radio' name='yes" + val['question_id'] + "' value='yes' id='radio-yes-" + val['question_id'] + "' " + rdcheck + " />";
//                                     div += "<label for='radio-yes-" + val['question_id'] + "'>Yes</label>";
//                                 } else {
//                                     div += "<input type='radio' name='yes" + val['question_id'] + "' value='" + v['answers_id'] + "' id='radio-no-" + val['question_id'] + "' " + rdcheck + " />";
//                                     div += "<label for='radio-no-" + val['question_id'] + "'>" + v['answer'] + "</label>";
//                                 }
//                                 div += "<br>";
//                             });

//                             // Add the text box after the line break to position it below the radio buttons.
//                             div += "<input type='text' class='form-control "+rdhide+"' value='" + other + "' name='question" + val['question_id'] + "-text' placeholder='Please specify' id='text-yes-" + val['question_id'] + "' />";

//                             // Add change event handlers to show/hide the text box based on the selected radio button.
//                             div += "<script>$('#radio-yes-" + val['question_id'] + ", #radio-no-" + val['question_id'] + "').on('change', function() {";
//                             div += "if ($('#radio-yes-" + val['question_id'] + "').is(':checked')) {";
//                             div += "$('#text-yes-" + val['question_id'] + "').show();";
//                             div += "} else {";
//                             div += "$('#text-yes-" + val['question_id'] + "').hide();";
//                             div += "}";
//                             div += "});</script>";
//                             div += "<br>";
//                         }

//                         else if (val['type'] == 'radioButton') {
//                             $.each(val['answers'], function (k, v) {
//                                 var rdcheck = (v['answer'] == v['fill']) ? 'checked=checked' : '';
//                                 if (v['answer'] === 'Others') { // Checking for 'Others' option
//                                     div += "<input type='radio' name='radioYes" + val['question_id'] + "' value='others' id='radio-others-" + val['question_id'] + "' " + rdcheck + "/>";
//                                     div += "<label for='radio-others-" + val['question_id'] + "'>Others</label>";
//                                 } else {
//                                     div += "<input type='radio' name='radioYes" + val['question_id'] + "' value='" + v['answers_id'] + "' id='radio-no-" + val['question_id'] + "' " + rdcheck + "/>";
//                                     div += "<label for='radio-no-" + val['question_id'] + "'>" + v['answer'] + "</label>";
//                                 }
//                                 div += "<br>";
//                             });

//                             // Add the text box for 'Others' after the line break to position it below the radio buttons.
//                             div += "<input type='text' class='form-control' name='question" + val['question_id'] + "-text' placeholder='Please specify' id='text-others-" + val['question_id'] + "' style='display:none;' />";

//                             // Add change event handlers to show/hide the text box based on the selected radio button.
//                             div += "<script>$('#radio-others-" + val['question_id'] + ", #radio-no-" + val['question_id'] + "').on('change', function() {";
//                             div += "if ($('#radio-others-" + val['question_id'] + "').is(':checked')) {";
//                             div += "$('#text-others-" + val['question_id'] + "').show();";
//                             div += "} else {";
//                             div += "$('#text-others-" + val['question_id'] + "').hide();";
//                             div += "}";
//                             div += "});</script>";

//                         }

//                         // else if (val['type'] == 'checkbox') {
//                         //     $.each(val['answers'], function (k, v) {
//                         //         div += "<input  type='checkbox' name='question" + val['question_id'] + "' value='" + v['answers_id'] + "' /><label>" + v['answer'] + "</label>";

//                         //         div += "<br>";


//                         //     });

//                         // } 

//                         else if (val['type'] == 'checkbox') {
//                             $.each(val['answers'], function (k, v) {
//                                 var checkboxId = 'checkbox-' + val['question_id'] + '-' + v['answers_id'];
//                                 if (v['fill'] !== null && v['fill'] !== undefined) {  
//                                     var fillArray = JSON.parse(v['fill']);
//                                     var isChecked = fillArray.includes(v['answer']);

//                                     div += "<input type='checkbox' name='question" + val['question_id'] + "' value='" + v['answers_id'] + "' id='" + checkboxId + "' " + (isChecked ? 'checked' : '') + "/>";
//                                 } else {
//                                     // Handle the case where 'fill' is null or undefined
//                                     div += "<input type='checkbox' name='question" + val['question_id'] + "' value='" + v['answers_id'] + "' id='" + checkboxId + "' />";
//                                 }

//                                 div += "<label for='" + checkboxId + "'>" + v['answer'] + "</label>";
//                                 div += "<br>";
//                             });
//                         }




//                         else if (val['type'] == 'textbox') {
//                             div += "<label for='employeeCommuting'>Employee Commuting (if applicable):</label>";
//                             div += "<input class='form-control' type='text' id='employeeCommuting' name='employeeCommuting' /><br>";
//                             div += "<label for='companyFleet'>Company Fleet (if applicable):</label>";
//                             div += "<input class='form-control' type='text' id='companyFleet' name='companyFleet' /><br>";
//                         }
//                         // else if (val['type'] == 'textforEnergyConsumption') {
//                         //     div += "<div class='row'>";
//                         //     div += "<div class='col-md-6'>";
//                         //     div += "<label for='electricity'>Electricity:</label>";
//                         //     div += "<input class='form-control' type='text' id='electricity' name='electricity' oninput='elec(this.value)' />";
//                         //     div += "</div>";
//                         //     div += "<div class='col-md-6'>";
//                         //     div += "<label for='naturalGas'>Natural Gas:</label>";
//                         //     div += "<input class='form-control' type='text' id='naturalGas' name='naturalGas'  />";
//                         //     div += "</div>";
//                         //     div += "</div>"; div += "<br>";
//                         //     div += "<div class='row'>";
//                         //     div += "<div class='col-md-12'>";
//                         //     div += "<label for='renewable'>Renewable Sources:</label>";
//                         //     div += "<input class='form-control' type='text' id='renewable' name='renewable' />"; div += "<br>";
//                         //     div += "</div>";
//                         //     div += "<div class='col-md-6'>";
//                         //     div += "<label for='otherName'>Others</label>";
//                         //     div += "<input class='form-control' type='text' id='otherName' name='otherName' />";
//                         //     div += "</div>";
//                         //     div += "<div class='col-md-6'>";
//                         //     div += "<label for='percentage'>Percentage</label>";
//                         //     div += "<input class='form-control' type='text' id='percentage' name='percentage' />";
//                         //     div += "</div>";
//                         //     div += "</div>";
//                         // }                      
//                         else if (val['type'] == 'textforEnergyConsumption') {
//                             div += "<div class='row'>";
//                             div += "<div class='col-md-6'>";
//                             div += "<label for='electricity'>Electricity:</label>";
//                             // Check if 'fill' is not null and parse the JSON
//                             var electricityFill = getFillValue(val, 'electricity');
//                             div += "<input class='form-control' type='text' id='electricity' name='electricity' value='" + electricityFill + "' />";
//                             div += "</div>";

//                             div += "<div class='col-md-6'>";
//                             div += "<label for='naturalGas'>Natural Gas:</label>";
//                             // Check if 'fill' is not null and parse the JSON
//                             var naturalGasFill = getFillValue(val, 'naturalGas');
//                             div += "<input class='form-control' type='text' id='naturalGas' name='naturalGas' value='" + naturalGasFill + "' />";
//                             div += "</div>";

//                             div += "</div>";
//                             div += "<br>";

//                             div += "<div class='row'>";
//                             div += "<div class='col-md-12'>";
//                             div += "<label for='renewable'>Renewable Sources:</label>";
//                             // Check if 'fill' is not null and parse the JSON
//                             var renewableFill = getFillValue(val, 'renewable');
//                             div += "<input class='form-control' type='text' id='renewable' name='renewable' value='" + renewableFill + "' />";
//                             div += "<br>";
//                             div += "</div>";

//                             div += "<div class='col-md-6'>";
//                             div += "<label for='otherName'>Others</label>";
//                             // Check if 'fill' is not null and parse the JSON
//                             var othersFill = getFillValue(val, 'otherName');
//                             div += "<input class='form-control' type='text' id='otherName' name='otherName' value='" + othersFill + "' />";
//                             div += "</div>";

//                             div += "<div class='col-md-6'>";
//                             div += "<label for='percentage'>Percentage</label>";
//                             // Check if 'fill' is not null and parse the JSON
//                             var percentageFill = getFillValue(val, 'percentage');
//                             div += "<input class='form-control' type='text' id='percentage' name='percentage' value='" + percentageFill + "' />";
//                             div += "</div>";

//                             div += "</div>";
//                         }





//                         else if (val['type'] == 'select') {
//                             div += "<select class='form-select' aria-label='Default select example'>";
//                             div += "<option selected>--Select--</option>";

//                             $.each(val['answers'], function (k, v) {
//                                 div += "<option value='" + v['answers_id'] + "'>" + v['answer'] + "</option>";
//                             });

//                             div += "</select>";
//                         }
//                         // else if (val['type'] == 'regular') {

//                         //     div += "<input class='form-control' name='textbox' type='text' placeholder='Enter Your Answer' value=''>";
//                         //     div += "<br>";
//                         // }
//                         else if (val['type'] == 'regular') {
//                             var answerData = val['answers'][0]; // Assuming there's only one answer in the array

//                             div += "<input class='form-control' name='textbox' type='text' placeholder='Enter Your Answer' value='" + (answerData['fill'] || '') + "'>";
//                             div += "<br>";
//                         }

//                         div += "</div>";
//                         card += div;
//                         console.log('data', card)
//                         questionNumber++;
//                     });


//                     // Store the question and answer data in localStorage
//                     var sectionData = {
//                         questions: quiz.map(q => {
//                             return {
//                                 anyTopic: selectedTopicId,
//                                 question_id: q.question_id,
//                                 question: q.question,
//                                 type: q.type,
//                                 answers: q.answers.map(a => {
//                                     return {
//                                         answer_id: a.answers_id,
//                                         answer: a.answer
//                                     };
//                                 }),
//                                 selectedAnswer: [],

//                             };
//                         })
//                     };

//                     localStorage.setItem('sectionData_' + selectedTopicId, JSON.stringify(sectionData));
//                     $('#accordion-body-' + selectedTopicId).html(card);
//                     $('.question-card input[type="radio"]').on('change', function () {
//                         var questionId = $(this).closest('.question-card').find('input[name="question_id"]').val();
//                         var answerValue = $(this).next('label').text();  // Get the text content of the label associated with the selected option
//                         // Find the question in sectionData and update the selectedAnswer
//                         var questionIndex = sectionData.questions.findIndex(q => q.question_id == questionId);
//                         if (questionIndex !== -1) {
//                             sectionData.questions[questionIndex].selectedAnswer = answerValue;  // Update to store the actual value
//                             localStorage.setItem('sectionData_' + selectedTopicId, JSON.stringify(sectionData));
//                         }
//                     });

//                     $('.question-card input[type="checkbox"]').on('change', function () {
//                         var questionId = $(this).closest('.question-card').find('input[name="question_id"]').val();

//                         // Get an array of selected label values for checkboxes
//                         var selectedValues = $('.question-card input[name="question' + questionId + '"]:checked').map(function () {
//                             return $(this).next('label').text(); // Get the text content of the associated label
//                         }).get();

//                         // Find the question in sectionData and update the selectedAnswer array
//                         var questionIndex = sectionData.questions.findIndex(q => q.question_id == questionId);
//                         if (questionIndex !== -1) {
//                             sectionData.questions[questionIndex].selectedAnswer = selectedValues;
//                             localStorage.setItem('sectionData_' + selectedTopicId, JSON.stringify(sectionData));
//                         }
//                     });

//                     $('.question-card input[type="text"]').on('input', function () {
//                         var questionId = $(this).closest('.question-card').find('input[name="question_id"]').val();
//                         var questionIndex = sectionData.questions.findIndex(q => q.question_id == questionId);
//                         if (questionIndex !== -1) {
//                             var questionData = sectionData.questions[questionIndex];

//                             if (questionData.type === 'textforEnergyConsumption') {
//                                 var energyConsumptionData = {
//                                     electricity: $(this).closest('.question-card').find('input[name="electricity"]').val(),
//                                     naturalGas: $(this).closest('.question-card').find('input[name="naturalGas"]').val(),
//                                     RenewableSources: $(this).closest('.question-card').find('input[name="renewable"]').val(),
//                                     Others: $(this).closest('.question-card').find('input[name="otherName"]').val(),
//                                     percentage: $(this).closest('.question-card').find('input[name="percentage"]').val(),
//                                 };

//                                 // Filter out key-value pairs where the value is empty
//                                 questionData.selectedAnswer = Object.entries(energyConsumptionData)
//                                     .filter(([key, value]) => value.trim() !== '')
//                                     .map(([key, value]) => ({ [key]: value }));

//                                 localStorage.setItem('sectionData_' + selectedTopicId, JSON.stringify(sectionData));
//                             }
//                         }
//                     });

//                     $('.question-card input[type="text"]').on('input', function () {
//                         var questionId = $(this).closest('.question-card').find('input[name="question_id"]').val();
//                         var questionIndex = sectionData.questions.findIndex(q => q.question_id == questionId);

//                         if (questionIndex !== -1) {
//                             var questionData = sectionData.questions[questionIndex];

//                             if (questionData.type === 'textbox') {
//                                 var annualMileageAndFuelConsumption = {
//                                     employeeCommuting: $(this).closest('.question-card').find('input[name="employeeCommuting"]').val(),
//                                     companyFleet: $(this).closest('.question-card').find('input[name="companyFleet"]').val(),

//                                 };

//                                 // Filter out key-value pairs where the value is empty
//                                 questionData.selectedAnswer = Object.entries(annualMileageAndFuelConsumption)
//                                     .filter(([key, value]) => value.trim() !== '')
//                                     .map(([key, value]) => ({ [key]: value }));

//                                 localStorage.setItem('sectionData_' + selectedTopicId, JSON.stringify(sectionData));
//                             }
//                         }
//                     });

//                     $('.question-card input[type="text"]').on('input', function () {
//                         var questionId = $(this).closest('.question-card').find('input[name="question_id"]').val();
//                         var questionIndex = sectionData.questions.findIndex(q => q.question_id == questionId);
//                         if (questionIndex !== -1) {
//                             var questionData = sectionData.questions[questionIndex];
//                             if (questionData.type === 'regular') {
//                                 // Assign the value directly to selectedAnswer
//                                 questionData.selectedAnswer = $(this).closest('.question-card').find('input[name="textbox"]').val();

//                                 localStorage.setItem('sectionData_' + selectedTopicId, JSON.stringify(sectionData));
//                             }
//                         }
//                     });
//                 }
//             },
//             error: function (xhr, status, error) {
//                 console.error(error);
//             }
//         });
//     }

//     $('#surveyForm').submit(function (event) {
//         var token = $("meta[name='csrf-token']").attr('content');
//         event.preventDefault();
//         var formData = [];
//         var localData = [];

//         // Loop through each question card
//         $('.question-card').each(function () {
//             var questionData = {};
//             questionData.question_id = $(this).find('input[name="question_id"]').val();

//             // questionData.question_id = $(this).find('input[name="question_id"]').val();
//             questionData.question = $(this).find('input[name="question"]').val();

//             questionData.anyTopic = selectedTopicId;

//             // Differentiate between question types and select the answer accordingly
//             var questionType = $(this).data('question-type');
//             questionData.questionType = questionType;

//             if (questionType === 'radio') {
//                 // questionData.answer = $(this).find('input[name^="yes"]').filter(':checked').val() || '';
//                 var selectedValue = $(this).find('input[name^="yes"]').filter(':checked').val();
//                 questionData.answer = (selectedValue === 'yes') ? 'yes' : 'no';
//             } else if (questionType === 'radioButton') {

//                 var selectedValue = $(this).find('input[name^="radioYes"]').filter(':checked').val();
//                 var selectedLabel = $(this).find('input[name^="radioYes"]').filter(':checked').next('label').text();
//                 questionData.answer = (selectedValue === 'others') ? 'Others' : selectedLabel;
//             }
//             else if (questionType === 'textforEnergyConsumption') {
//                 var energyConsumptionData = {
//                     electricity: $(this).find('input[name="electricity"]').val(),
//                     naturalGas: $(this).find('input[name="naturalGas"]').val(),
//                     renewable: $(this).find('input[name="renewable"]').val(),
//                     otherName: $(this).find('input[name="otherName"]').val(),
//                     percentage: $(this).find('input[name="percentage"]').val(),
//                 };
//                 questionData.energyConsumption = energyConsumptionData;

//             }
//             else if (questionType === 'textbox') {
//                 var annualMileage = {
//                     employeeCommuting: $(this).find('input[name="employeeCommuting"]').val(),
//                     companyFleet: $(this).find('input[name="companyFleet"]').val(),

//                 };
//                 questionData.annualMileage = annualMileage;

//             }

//             else if (questionType === 'checkbox') {
//                 var answers = [];
//                 $(this).find('input[name^="question"]').filter(':checked').each(function () {
//                     var label = $(this).next('label').text();
//                     answers.push(label);
//                 });
//                 questionData.answer = answers;
//             }
//             else if (questionType === 'regular') {
//                 var answers = [];
//                 questionData.textbox = $(this).find('input[name ="textbox"]').val() || '';
//                 questionData.answer = answers;
//             }

//             else {
//                 // Handle other question types here
//             }
//             // questionData.textbox = $(this).find('input[name ="textbox"]').val() || '';
//             questionData.text = $('input[name="question' + questionData.question_id + '-text"]').val() || '';
//             questionData.employeeCommuting = $(this).find('input[name="employeeCommuting"]').val();
//             questionData.companyFleet = $(this).find('input[name="companyFleet"]').val();
//             formData.push(questionData);
//         });
//         var storedData = JSON.parse(localStorage.getItem('sectionData_' + selectedTopicId));
//         // Combine the new form data with the stored data
//         var combinedData = storedData.questions.map((storedQuestion) => {
//             var matchingQuestion = localData.find((formQuestion) => formQuestion.question_id == storedQuestion.question_id);
//             if (matchingQuestion) {
//                 return { ...storedQuestion, selectedAnswer: matchingQuestion.answer };
//             }
//             return storedQuestion;
//         });

//         // Send the structured form data to the server
//         $.ajax({
//             url: '/submit-answer',
//             headers: {
//                 'X-CSRF-TOKEN': token
//             },
//             method: 'POST',
//             data: {

//                 answers: JSON.stringify(formData)

//             },
//             success: function (response) {
//                 // // window.location.href = '/dashboard';
//                 // localStorage.setItem('surveyData', JSON.stringify(formData));
//             },
//             error: function (xhr, status, error) {
//                 console.error(error);
//             }
//         });
//     });

// }



function fetchQuestions3(selectedTopicId) {
    localStorage.setItem('selectedTopicId', selectedTopicId);
    var token = $("meta[name='csrf-token']").attr('content');
    var form = $('.accordion-item');
    form.find('.question-card').remove();
    form.find('.accordion-body').html('');
    var questionNumber = 1;
    if (selectedTopicId) {
        $.ajax({
            url: '/get-questions',
            headers: {
                'X-CSRF-TOKEN': token
            },
            method: 'POST',
            data: {
                _token: token,
                topic_id: selectedTopicId
            },
            success: function (data) {
                var jsonObj = JSON.parse(JSON.stringify(data));
                var card = '';

                var success = jsonObj.success;
                if (success) {
                    var quiz = jsonObj.questions;

                    $.each(quiz, function (key, val) {

                        var div = "<div class='question-card' data-question-type='" + val['type'] + "'>";
                        div += "<br>";
                        div += "<div><strong style='color: white;'>" + questionNumber + " ) </strong> " + val['question'] + "</div>";
                        div += "<input type='hidden' name='question' value='" + val['question'] + "' />";
                        div += "<input type='hidden' name='question_id' value='" + val['question_id'] + "' />";
                        if (val['type'] == 'radio') {
                            var rdhide = 'hide';
                            var other = '';
                            $.each(val['answers'], function (k, v) {
                                var rdcheck = (v['answer'].toLowerCase() == v['fill']) ? 'checked=checked' : '';
                                if (v['answer'] == 'Yes') {
                                    rdhide = (v['answer'].toLowerCase() == v['fill']) ? '' : 'hide';
                                    other = (v['answer'].toLowerCase() == v['fill']) ? v['other'] : '';
                                    div += "<input type='radio' name='yes" + val['question_id'] + "' value='yes' id='radio-yes-" + val['question_id'] + "' " + rdcheck + " />";
                                    div += "<label for='radio-yes-" + val['question_id'] + "'>Yes</label>";
                                } else {
                                    div += "<input type='radio' name='yes" + val['question_id'] + "' value='" + v['answers_id'] + "' id='radio-no-" + val['question_id'] + "' " + rdcheck + " />";
                                    div += "<label for='radio-no-" + val['question_id'] + "'>" + v['answer'] + "</label>";
                                }
                                div += "<br>";
                            });

                            // Add the text box after the line break to position it below the radio buttons.
                            div += "<input type='text' class='form-control " + rdhide + "' value='" + other + "' name='question" + val['question_id'] + "-text' placeholder='Please specify' id='text-yes-" + val['question_id'] + "' />";

                            // Add change event handlers to show/hide the text box based on the selected radio button.
                            div += "<script>$('#radio-yes-" + val['question_id'] + ", #radio-no-" + val['question_id'] + "').on('change', function() {";
                            div += "if ($('#radio-yes-" + val['question_id'] + "').is(':checked')) {";
                            div += "$('#text-yes-" + val['question_id'] + "').show();";
                            div += "} else {";
                            div += "$('#text-yes-" + val['question_id'] + "').hide();";
                            div += "}";
                            div += "});</script>";
                            div += "<br>";
                        }

                        else if (val['type'] == 'radioButton') {
                            $.each(val['answers'], function (k, v) {
                                var rdcheck = (v['answer'] == v['fill']) ? 'checked=checked' : '';
                                if (v['answer'] === 'Others') { // Checking for 'Others' option
                                    div += "<input type='radio' name='radioYes" + val['question_id'] + "' value='others' id='radio-others-" + val['question_id'] + "' " + rdcheck + "/>";
                                    div += "<label for='radio-others-" + val['question_id'] + "'>Others</label>";
                                } else {
                                    div += "<input type='radio' name='radioYes" + val['question_id'] + "' value='" + v['answers_id'] + "' id='radio-no-" + val['question_id'] + "' " + rdcheck + "/>";
                                    div += "<label for='radio-no-" + val['question_id'] + "'>" + v['answer'] + "</label>";
                                }
                                div += "<br>";
                            });

                            // Add the text box for 'Others' after the line break to position it below the radio buttons.
                            div += "<input type='text' class='form-control' name='question" + val['question_id'] + "-text' placeholder='Please specify' id='text-others-" + val['question_id'] + "' style='display:none;' />";

                            // Add change event handlers to show/hide the text box based on the selected radio button.
                            div += "<script>$('#radio-others-" + val['question_id'] + ", #radio-no-" + val['question_id'] + "').on('change', function() {";
                            div += "if ($('#radio-others-" + val['question_id'] + "').is(':checked')) {";
                            div += "$('#text-others-" + val['question_id'] + "').show();";
                            div += "} else {";
                            div += "$('#text-others-" + val['question_id'] + "').hide();";
                            div += "}";
                            div += "});</script>";

                        }
                        else if (val['type'] == 'checkbox') {
                            $.each(val['answers'], function (k, v) {
                                var checkboxId = 'checkbox-' + val['question_id'] + '-' + v['answers_id'];
                                if (v['fill'] !== null && v['fill'] !== undefined) {
                                    var fillArray = JSON.parse(v['fill']);
                                    var isChecked = fillArray.includes(v['answer']);

                                    div += "<input type='checkbox' name='question" + val['question_id'] + "' value='" + v['answers_id'] + "' id='" + checkboxId + "' " + (isChecked ? 'checked' : '') + "/>";
                                } else {
                                    // Handle the case where 'fill' is null or undefined
                                    div += "<input type='checkbox' name='question" + val['question_id'] + "' value='" + v['answers_id'] + "' id='" + checkboxId + "' />";
                                }

                                div += "<label for='" + checkboxId + "'>" + v['answer'] + "</label>";
                                div += "<br>";
                            });
                        }

                        else if (val['type'] == 'textbox') {
                            div += "<label for='employeeCommuting'>Employee Commuting (if applicable):</label>";
                            var employeeCommutingFill = getTextBoxValue(val, 'employeeCommuting');
                            div += "<input class='form-control' type='text' id='employeeCommuting' name='employeeCommuting' value='" + employeeCommutingFill + "'/><br>";
                            div += "<label for='companyFleet'>Company Fleet (if applicable):</label>";
                            var companyFleetFill = getTextBoxValue(val, 'companyFleet');
                            div += "<input class='form-control' type='text' id='companyFleet' name='companyFleet' value='" + companyFleetFill + "' /><br>";
                        }
                        else if (val['type'] == 'textforEnergyConsumption') {
                            div += "<div class='row'>";
                            div += "<div class='col-md-6'>";
                            div += "<label for='electricity'>Electricity:</label>";
                            // Check if 'fill' is not null and parse the JSON
                            var electricityFill = getFillValue(val, 'electricity');
                            div += "<input class='form-control' type='text' id='electricity' name='electricity' value='" + electricityFill + "' />";
                            div += "</div>";

                            div += "<div class='col-md-6'>";
                            div += "<label for='naturalGas'>Natural Gas:</label>";
                            // Check if 'fill' is not null and parse the JSON
                            var naturalGasFill = getFillValue(val, 'naturalGas');
                            div += "<input class='form-control' type='text' id='naturalGas' name='naturalGas' value='" + naturalGasFill + "' />";
                            div += "</div>";

                            div += "</div>";
                            div += "<br>";

                            div += "<div class='row'>";
                            div += "<div class='col-md-12'>";
                            div += "<label for='renewable'>Renewable Sources:</label>";
                            // Check if 'fill' is not null and parse the JSON
                            var renewableFill = getFillValue(val, 'renewable');
                            div += "<input class='form-control' type='text' id='renewable' name='renewable' value='" + renewableFill + "' />";
                            div += "<br>";
                            div += "</div>";

                            div += "<div class='col-md-6'>";
                            div += "<label for='otherName'>Others</label>";
                            // Check if 'fill' is not null and parse the JSON
                            var othersFill = getFillValue(val, 'otherName');
                            div += "<input class='form-control' type='text' id='otherName' name='otherName' value='" + othersFill + "' />";
                            div += "</div>";

                            div += "<div class='col-md-6'>";
                            div += "<label for='percentage'>Percentage</label>";
                            // Check if 'fill' is not null and parse the JSON
                            var percentageFill = getFillValue(val, 'percentage');
                            div += "<input class='form-control' type='text' id='percentage' name='percentage' value='" + percentageFill + "' />";
                            div += "</div>";

                            div += "</div>";
                        }
                        else if (val['type'] == 'regular') {
                            var answerData = val['answers'][0];

                            div += "<input class='form-control' name='textbox' type='text' placeholder='Enter Your Answer' value='" + (answerData['fill'] || '') + "'>";
                            div += "<br>";
                        }

                        div += "</div>";
                        card += div;
                        questionNumber++;
                    });

                    $('#accordion-body-' + selectedTopicId).html(card);

                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
   
    $('#surveyForm').submit(function (event) {
        var token = $("meta[name='csrf-token']").attr('content');
        event.preventDefault();
        var formData = [];
        // Loop through each question card
        $('.question-card').each(function () {
            var questionData = {};
            questionData.question_id = $(this).find('input[name="question_id"]').val();

            // questionData.question_id = $(this).find('input[name="question_id"]').val();
            questionData.question = $(this).find('input[name="question"]').val();

            questionData.anyTopic = selectedTopicId;

            // Differentiate between question types and select the answer accordingly
            var questionType = $(this).data('question-type');
            questionData.questionType = questionType;

            if (questionType === 'radio') {
                // questionData.answer = $(this).find('input[name^="yes"]').filter(':checked').val() || '';
                var selectedValue = $(this).find('input[name^="yes"]').filter(':checked').val();
                questionData.answer = (selectedValue === 'yes') ? 'yes' : 'no';
            } else if (questionType === 'radioButton') {

                var selectedValue = $(this).find('input[name^="radioYes"]').filter(':checked').val();
                var selectedLabel = $(this).find('input[name^="radioYes"]').filter(':checked').next('label').text();
                questionData.answer = (selectedValue === 'others') ? 'Others' : selectedLabel;
            }
            else if (questionType === 'textforEnergyConsumption') {
                var energyConsumptionData = {
                    electricity: $(this).find('input[name="electricity"]').val(),
                    naturalGas: $(this).find('input[name="naturalGas"]').val(),
                    renewable: $(this).find('input[name="renewable"]').val(),
                    otherName: $(this).find('input[name="otherName"]').val(),
                    percentage: $(this).find('input[name="percentage"]').val(),
                };
                questionData.energyConsumption = energyConsumptionData;

            }
            else if (questionType === 'textbox') {
                var annualMileage = {
                    employeeCommuting: $(this).find('input[name="employeeCommuting"]').val(),
                    companyFleet: $(this).find('input[name="companyFleet"]').val(),

                };
                questionData.annualMileage = annualMileage;

            }

            else if (questionType === 'checkbox') {
                var answers = [];
                $(this).find('input[name^="question"]').filter(':checked').each(function () {
                    var label = $(this).next('label').text();
                    answers.push(label);
                });
                questionData.answer = answers;
            }
            else if (questionType === 'regular') {
                var answers = [];
                questionData.textbox = $(this).find('input[name ="textbox"]').val() || '';
                questionData.answer = answers;
            }

            else {
                // Handle other question types here
            }
            // questionData.textbox = $(this).find('input[name ="textbox"]').val() || '';
            questionData.text = $('input[name="question' + questionData.question_id + '-text"]').val() || '';
            questionData.employeeCommuting = $(this).find('input[name="employeeCommuting"]').val();
            questionData.companyFleet = $(this).find('input[name="companyFleet"]').val();
            formData.push(questionData);
        });
        
            // Send the structured form data to the server
        $.ajax({
            url: '/submit-answer',
            headers: {
                'X-CSRF-TOKEN': token
            },
            method: 'POST',
            data: {

                answers: JSON.stringify(formData)

            },
            success: function (response) {
                // window.location.href = '/dashboard';
                location.reload();

            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });
        

        
    });

}

$(document).ready(function() {
    var token = $("meta[name='csrf-token']").attr('content');
    $('#surveyForm').on('change', ':input', function() {
        formData = formDataGet();
        $.ajax({
            url: '/submit-answer',
            headers: {
                'X-CSRF-TOKEN': token
            },
            method: 'POST',
            data: {
                answers: JSON.stringify(formData)
            },
            success: function (response) {
            },
            error: function (xhr, status, error) {
            }
        });
    });
});

function formDataGet(){
    var formData = [];
    // Loop through each question card
    $('.question-card').each(function () {
        var questionData = {};
        var selectedTopicId = localStorage.getItem('selectedTopicId');
        questionData.question_id = $(this).find('input[name="question_id"]').val();

        // questionData.question_id = $(this).find('input[name="question_id"]').val();
        questionData.question = $(this).find('input[name="question"]').val();

        questionData.anyTopic = selectedTopicId;

        // Differentiate between question types and select the answer accordingly
        var questionType = $(this).data('question-type');
        questionData.questionType = questionType;

        if (questionType === 'radio') {
            // questionData.answer = $(this).find('input[name^="yes"]').filter(':checked').val() || '';
            var selectedValue = $(this).find('input[name^="yes"]').filter(':checked').val();
            questionData.answer = (selectedValue === 'yes') ? 'yes' : 'no';
        } else if (questionType === 'radioButton') {

            var selectedValue = $(this).find('input[name^="radioYes"]').filter(':checked').val();
            var selectedLabel = $(this).find('input[name^="radioYes"]').filter(':checked').next('label').text();
            questionData.answer = (selectedValue === 'others') ? 'Others' : selectedLabel;
        }
        else if (questionType === 'textforEnergyConsumption') {
            var energyConsumptionData = {
                electricity: $(this).find('input[name="electricity"]').val(),
                naturalGas: $(this).find('input[name="naturalGas"]').val(),
                renewable: $(this).find('input[name="renewable"]').val(),
                otherName: $(this).find('input[name="otherName"]').val(),
                percentage: $(this).find('input[name="percentage"]').val(),
            };
            questionData.energyConsumption = energyConsumptionData;

        }
        else if (questionType === 'textbox') {
            var annualMileage = {
                employeeCommuting: $(this).find('input[name="employeeCommuting"]').val(),
                companyFleet: $(this).find('input[name="companyFleet"]').val(),

            };
            questionData.annualMileage = annualMileage;

        }

        else if (questionType === 'checkbox') {
            var answers = [];
            $(this).find('input[name^="question"]').filter(':checked').each(function () {
                var label = $(this).next('label').text();
                answers.push(label);
            });
            questionData.answer = answers;
        }
        else if (questionType === 'regular') {
            var answers = [];
            questionData.textbox = $(this).find('input[name ="textbox"]').val() || '';
            questionData.answer = answers;
        }

        else {
            // Handle other question types here
        }
        // questionData.textbox = $(this).find('input[name ="textbox"]').val() || '';
        questionData.text = $('input[name="question' + questionData.question_id + '-text"]').val() || '';
        questionData.employeeCommuting = $(this).find('input[name="employeeCommuting"]').val();
        questionData.companyFleet = $(this).find('input[name="companyFleet"]').val();
        formData.push(questionData);
    });
    return formData;
}

function getFillValue(question, key) {
    if (question['answers'] && question['answers'].length > 0) {
        var fillArray = JSON.parse(question['answers'][0]['fill']);

        // Check if fillArray is not null or undefined before using find
        if (fillArray && fillArray.length > 0) {
            var fillObject = fillArray.find(item => item[key] !== undefined);
            return fillObject ? fillObject[key] : '';
        }
    }
    return '';
}

function getTextBoxValue(question, key) {
    if (question['answers'] && question['answers'].length > 0) {
        var fillArray = JSON.parse(question['answers'][0]['fill']);

        // Check if fillArray is not null or undefined before using find
        if (fillArray && fillArray.length > 0) {
            var fillObject = fillArray.find(item => item[key] !== undefined);
            return fillObject ? fillObject[key] : '';
        }
    }
    return '';
}














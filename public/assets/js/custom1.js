
$(document).ready(function () {
    var clientId = 1;
    $(".add-client-detail").click(function () {
        clientId++;
        var newClientDetail = `
            <div class="card">
                <div class="card-header" id="heading${clientId}">
                    <h2 class="mb-0">
                        
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse${clientId}" aria-expanded="true" aria-controls="collapseOne">
                          <i class="bi bi-chevron-down "></i> 
                                                                                <h2> Client Details ${clientId} </h2>
                                                                            </button>
                    </h2>
                </div>
                <div id="collapse${clientId}" class="collapse" aria-labelledby="heading${clientId}" data-parent="#accordionClientDetails">
                    <div class="card-body">
                    <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                            <label class="form-label mb-3">Client Name</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" name="client_name[]" placeholder="" value="">
                    </div>
                    <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                            <label class="form-label mb-3">Project Title</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" name="project_title[]" placeholder="" value="">
                    </div>
     
                                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                        <label class="form-label mb-3">Description [Min:10, Max:400]</label>
                                                                                        <textarea class="form-control form-control-lg form-control-solid" name="description[]" rows="4" placeholder=""></textarea>
                                                                                    </div>
                                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                            <label class="form-label mb-3">Highlights</label>
                                                                            <input type="text" class="form-control form-control-lg form-control-solid" name="highlights[]" placeholder="" value="">
                                                                        </div>
                                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                <label class="form-label mb-3"> Project Size (Financially)</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="project_size[]" placeholder="Enter amount" value="">
                                                                                    <select class="form-select form-select-lg form-select-solid" name="project_size_currency[]">

                                                                                        <option value="1">INR</option>
                                                                                        <option value="2">USD</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        <div class="mb-10 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                                                                                <label class="form-label mb-3">Project Duration</label>
                                                                                <div class="input-group">
                                                                                    <!-- Year Input -->
                                                                                    <input type="text" class="form-control form-control-lg form-control-solid" name="project_duration_in_year[]" placeholder="Years" value="">

                                                                                    <!-- Month Dropdown -->
                                                                                    <select class="form-select form-select-lg form-select-solid" name="project_duration_in_month[]">
                                                                                        <option value="0">0 month</option>
                                                                                        <option value="1">1 month</option>
                                                                                        <option value="2">2 months</option>
                                                                                        <option value="3">3 months</option>
                                                                                        <option value="4">4 months</option>
                                                                                        <option value="5">5 months</option>
                                                                                        <option value="6">6 months</option>
                                                                                        <option value="7">7 months</option>
                                                                                        <option value="8">8 months</option>
                                                                                        <option value="9">9 months</option>
                                                                                        <option value="10">10 months</option>
                                                                                        <option value="11">11 months</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                      
                                                                        <button type="button" class="btn btn-danger remove-client-detail">
                                                                                <i class="fas fa-trash"></i> 
                                                                            </button>
                    </div>
                </div>
            </div>
        `;
        $("#accordionClientDetails").append(newClientDetail);
    });

    // Remove a set of client details fields
    $(document).on("click", ".remove-client-detail", function () {
        $(this).closest(".card").remove();
    });
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


// Add an event listener to the radio buttons to toggle the visibility of the fields
const servicesFields = document.getElementById('servicesFields');
const productsFields = document.getElementById('productsFields');
const serviceRadio = document.querySelector('input[name="service_or_product"][value="services"]');
const productRadio = document.querySelector('input[name="service_or_product"][value="products"]');

serviceRadio.addEventListener('change', () => {
    if (serviceRadio.checked) {
        servicesFields.style.display = 'block';
        productsFields.style.display = 'none';
    }
});

productRadio.addEventListener('change', () => {
    if (productRadio.checked) {
        productsFields.style.display = 'block';
        servicesFields.style.display = 'none';
    }
});

// Service drop down selection
document.addEventListener("DOMContentLoaded", function () {
    const categoryDropdown = document.getElementById("categoryDropdown");

    const subcategoryDropdown = document.getElementById("subCategoryDropdown");

    const otherSubcategoryInputContainer = document.getElementById("otherSubcategoryInputContainer");
    const otherSubcategoryInput = document.getElementById("otherSubcategoryInput");
    subcategoryDropdown.addEventListener("change", function () {
        const selectedSubcategoryId = this.value;

        if (selectedSubcategoryId === "100") {
            otherSubcategoryInputContainer.style.display = "block";
        } else {
            otherSubcategoryInputContainer.style.display = "none";
            otherSubcategoryInput.value = "";
        }
    });
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


});

// Product Dropdown selection
document.addEventListener("DOMContentLoaded", function () {
    const categoryDropdown = document.getElementById("productCategoryDropdown");

    const subcategoryDropdown = document.getElementById("subProductCategoryDropdown");

    const otherSubcategoryInputContainer = document.getElementById("otherSubProductcategoryInputContainer");
    const otherSubcategoryInput = document.getElementById("otherProductSubcategoryInput");
    subcategoryDropdown.addEventListener("change", function () {
        const selectedSubcategoryId = this.value;

        if (selectedSubcategoryId === "100") {
            otherSubcategoryInputContainer.style.display = "block";
        } else {
            otherSubcategoryInputContainer.style.display = "none";
            otherSubcategoryInput.value = "";
        }
    });
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


/* Edit Functionality For Client Details */
// $('.edit-button').click(function () {
//     var expId = $(this).data('exp-id');
//     $.ajax({
//         url: '/editExp/' + expId,
//         type: 'GET',
//         success: function (data) {
//             $('#kt_modal_1 input[name="client_id"]').val(expId);
//             $('#kt_modal_1 input[name="client_name"]').val(data.client_name);
//             $('#kt_modal_1 input[name="project_title[]"]').val(data.project_title);
//             $('#kt_modal_1 textarea[name="description[]"]').val(data.description);
//             $('#kt_modal_1 input[name="highlights[]"]').val(data.highlights);
//             $('#kt_modal_1 input[name="project_size[]"]').val(data.project_size);
//             $('#kt_modal_1 input[name="project_duration_in_year[]"]').val(data.project_duration_in_year);
//         }
//     });
// });

// Update Client Details


// $(document).ready(function () {
//     $('#update-button').click(function () {
//         var token = $("meta[name='csrf-token']").attr('content');
//         var expId = $('#client_id').val();
//         var clientName = $('#client_name').val();
//         var projectTitle = $('#project_title').val();
//         var description = $('#description').val();
//         var highlights = $('#highlights').val();
//         var projectSize = $('#project_size').val();
//         var projectSizeCurrency = $('#project_size_currency').val();

//         $.ajax({
//             type: 'PUT',
//             url: '/updateExp/' + expId,
//             headers: { // Change 'header' to 'headers'
//                 'X-CSRF-TOKEN': token
//             },
//             data: {
//                 _token: token,
//                 client_name: clientName,
//                 project_title: projectTitle,
//                 description: description,
//                 highlights: highlights,
//                 project_size: projectSize,
//                 project_size_currency: projectSizeCurrency
//             },
//             success: function (response) {
//                 console.log(response.message);
//             },
//             error: function (xhr) {
//                 var errors = xhr.responseJSON.errors;
//                 // Handle errors here
//             }
//         });

//         location.reload();
//         return false;
//     });
// });




// delete Client Details

// $('.delete-button').on('click', function () {
//     if (confirm('Are you sure you want to delete this experience?')) {
//         var token = $("meta[name='csrf-token'").attr('content');
//         var expId = $(this).data('exp-id');


//         $.ajax({
//             url: '/deleteExp/' + expId,
//             header: {
//                 'X-CSRF-TOKEN': token
//             },
//             type: 'DELETE',
//             data: {
//                 "_token": token
//             },
//             success: function (response) {
//                 $(this).closest('tr').remove();
//                 alert(response.message);
//             },
//             error: function (response) {
//                 alert('Error: ' + response.responseJSON.message);
//             }
//         });
//         location.reload();
//         return false;
//     }
// });

















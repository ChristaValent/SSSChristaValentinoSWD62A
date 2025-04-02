// this function is used to update the URL with the filer and sorting parameters 
function updateUrlParams(param, value) {
    let urlParams = new URLSearchParams(window.location.search); // Get the current URL parameters
    let sort = urlParams.get('sort_order'); //store the current sort order
    let collegeId = urlParams.get('college_id'); //store the current college id
    let url = ""

    // id the param is sort_order then add the sort_order to the url and if filtering is applied, then add college_id also with an &
    if(param === 'sort_order'){
        url = url +'?sort_order=' + value;
        if(collegeId != null){
            url = url +'&college_id=' + collegeId;
        }
    }//same as before but if the param is college_id
    else if(param === 'college_id'){
        url = url +'?college_id=' + value;
        if(sort){
            url = url +'&sort_order=' + sort;
        }
    }    

    // Construct the new URL parameters with the updated parameters
    urlParts = window.location.href.split('?');

    //if url already has parameters then update params
    if (urlParts.length > 1) {
        // URL already has query parameters
        window.location.href = urlParts[0] + url;
    }
    else { //else add the params to the url
        window.location.href = window.location.href + url;
    }
}

// Get the filter element by its ID so it won't be null
const collegeFilter = document.getElementById('filter_college_id');
if (collegeFilter) {
    collegeFilter.addEventListener('change', function () {
        let collegeId = this.value || this.options[this.selectedIndex].value; // Get the selected value
        updateUrlParams('college_id', collegeId); // Update the URL with the selected college ID
    });
}

// Get the sort button element by its ID
const sortStudent = document.getElementById('sort_student');
if (sortStudent) {
    sortStudent.addEventListener('click', function () {
        event.preventDefault(); // Prevent the url from going to default

        let urlParams = new URLSearchParams(window.location.search); // Get the current URL parameters
        let currentSort = urlParams.get('sort_order'); // Get the current sort order

        // loop though the sort order by getting the current sort order and setting the next sort order
        if (currentSort === 'asc') {
            nextSort = 'desc';
        }
        else if (currentSort === 'desc') {
            nextSort = 'none';
        }
        else {
            nextSort = 'asc';
        }

        // Update URL without affecting filters
        updateUrlParams('sort_order', nextSort);
    });
}

// Get the delete button element by its class name
const btndelete = document.querySelectorAll('.btn-delete');
if (btndelete) { 
    btndelete.forEach((button) => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); 
            if (confirm("Are you sure?")) { // Confirm the delete action
                let action = this.getAttribute('href')
                let form = document.getElementById('form-delete')
                form.setAttribute('action', action)
                form.submit()
            }
        })
    })
}

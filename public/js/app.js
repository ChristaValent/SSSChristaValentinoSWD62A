function updateUrlParams(param, value) {
    let urlParams = new URLSearchParams(window.location.search);
    let sort = urlParams.get('sort_order');
    let collegeId = urlParams.get('college_id');
    let url = ""

    console.log("S: " + sort + " C: " + collegeId);

    if(param === 'sort_order'){
        url = url +'?sort_order=' + value;
        if(collegeId != null){
            url = url +'&college_id=' + collegeId;
        }
    }
    else if(param === 'college_id'){
        url = url +'?college_id=' + value;
        if(sort){
            url = url +'&sort_order=' + sort;
        }
    }    

    // Construct and update the URL without reloading the entire page
    urlParts = window.location.href.split('?');

    if (urlParts.length > 1) {
        // URL already has query parameters
        window.location.href = urlParts[0] + url;
    }
    else {
        window.location.href = window.location.href + url;
    }
}

document.getElementById('filter_college_id').addEventListener('change', function () {
    let collegeId = this.value || this.options[this.selectedIndex].value;
    updateUrlParams('college_id', collegeId);
});

document.getElementById('sort_student').addEventListener('click', function () {
    let urlParams = new URLSearchParams(window.location.search);
    let currentSort = urlParams.get('sort_order');

    var nextSort = 'none';

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


document.querySelectorAll('.btn-delete').forEach((button) => {
    button.addEventListener('click', function(event){
        event.preventDefault();
        if(confirm("Are you sure?")){
            let action = this.getAttribute('href')
            let form = document.getElementById('form-delete')
            form.setAttribute('action', action)
            form.submit()
        }
    })
})
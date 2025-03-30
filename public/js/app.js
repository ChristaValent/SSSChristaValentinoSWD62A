document.getElementById('filter_college_id').addEventListener('change',
    function () {
        let collegeId = this.value || this.options[this.selectedIndex].value;
        window.location.href= window.location.href.split('?')[0] + '?college_id=' + collegeId
    }
)

// document.getElementById('sort_student').addEventListener('click',
//     function () {
//         // let sortValue = this.value || this.options[this.selectedIndex].value;
//         // window.location.href= window.location.href.split('?')[0] + '?name=' + sortValue

//         alert('Sort by: ' + this.value)
//     }
// )


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
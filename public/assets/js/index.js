function validationForm(forms) {
    Array.prototype.filter.call(forms, function (form) {
        form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
}

Date.prototype.toDateInputValue = (function () {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0, 10);
});

/**
 * @params {element} document.getElementById
 * @return void
 */
var displayFileName = (e) => {
    if (e) {
        if (e.dataset.cache) {
            let f = new File([""], e.dataset.cache, {
                type: "application/pdf",
                lastModified: Date.now()
            })
            e.files = new FileListItems([f])
        }
    }
}

/**
 * @params {array} files List of file items
 * @return FileList
 */
function FileListItems(files) {
    var b = new ClipboardEvent("").clipboardData || new DataTransfer()
    for (var i = 0, len = files.length; i < len; i++) b.items.add(files[i])
    return b.files
}
/**
 * @params {element} document.getElementById
 * @return FileList
 */
function enterNoSubmit(e) {
    e.onkeypress = function (e) {
        if (e.which == 13) {
            e.preventDefault();
            return false;
        }
    }
}

/**
 * @params {element} document.getElementById
 * @return path string
 */
var uploadFile = async e => {
    const config = {
        onUploadProgress: function (progressEvent) {
            var percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total)
            let progress = e.offsetParent.getElementsByClassName('progress')[0]
            progress.classList.add('show-contract')
            progress.classList.remove('hide-contract')
            progress.children[0].style.width = `${percentCompleted-10}%`
            progress.children[0].textContent = `${percentCompleted-10}%`

        },
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }
    let uri = "/legal/uploadfile"
    let data = new FormData()
    data.append('file', e.files[0])
    axios.post(uri, data, config)
        .then(res => {
            e.offsetParent.querySelector(`input[name='${e.dataset.name}']`).value = res.data.path
            e.offsetParent.getElementsByClassName('progress-bar')[0].style.width = `100%`
            e.offsetParent.getElementsByClassName('progress-bar')[0].textContent = `100%`
            e.offsetParent.getElementsByClassName('progress-bar')[0].textContent = `Success !`
        })
        .catch(err => {
            e.offsetParent.getElementsByClassName('progress-bar')[0].classList.remove('bg-success')
            e.offsetParent.getElementsByClassName('progress-bar')[0].classList.add('bg-danger')
            e.offsetParent.getElementsByClassName('progress-bar')[0].textContent = `Fail !  ${err.response.statusText}`
        })
}

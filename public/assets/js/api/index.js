function status(response) {
    if (response.status >= 200 && response.status < 300) {
        return Promise.resolve(response)
    } else {
        return Promise.reject(new Error(response.statusText))
    }
}

function json(response) {
    return response.json()
}


const getAccessoriesId = id => fetch("/api/accessorie/" + id + "/checkstock").then(status).then(json)
// const getAccessoriesAvailable = () => fetch("/accessorie/available").then(status).then(json)



const clearModal = (modal) => {
    modal.find('.modal-body form')[0].reset()
    for (const _el of modal.find('.form-control')) {
        _el.disabled = false
    }
    modal.find('.modal-body form')[0].action = window.location.pathname
    modal.find('#methodPut').remove()
}


function ISOtoLongDate(isoString, locale = "en-US") {
    const options = {
        month: "long",
        day: "numeric",
        year: "numeric"
    };
    const date = new Date(isoString);
    return new Intl.DateTimeFormat(locale, options).format(date);
}

function ISOtoDate(isoString, locale = "en-US") {
    const options = {
        month: "numeric",
        day: "numeric",
        year: "numeric"
    };
    const date = new Date(isoString);
    return new Intl.DateTimeFormat(locale, options).format(date);
}


// api KPI-System

const getRuleDropdown = () => fetch("/kpi/rule-dropdown").then(status).then(json)

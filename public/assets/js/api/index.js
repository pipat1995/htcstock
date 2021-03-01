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
    return new Intl.DateTimeFormat(locale, options).format(date)
}


// api KPI-System

const getRuleDropdown = (group) => fetch(`/kpi/rule-dropdown/${group.id}`).then(status).then(json)

const postRuleTemplate = (template, form) => axios({
    method: 'POST',
    responseType: 'json',
    url: `/kpi/template/${template.id}/edit/rule-template`,
    data: form
})

const getRuleTemplate = (template) => axios({
    method: 'GET',
    responseType: 'json',
    url: `/kpi/template/${template.id}/edit/ruletemplate/bytemplate`
})

const switRuleTemplate = (template,form) => axios({
    method: 'PUT',
    responseType: 'json',
    url: `/kpi/template/${template.id}/edit/ruletemplate/switch`,
    data: form
})

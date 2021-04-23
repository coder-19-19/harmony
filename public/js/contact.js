const messageForm = $('#message-form')

messageForm.on('submit', e => {
    let data = messageForm.serialize()
    $.post(`${contact_url}/app/message.php`, data, response => {
        if (response.error) {
            M.toast({html:response.error})
        }
        else if(response.success){
            M.toast({html: response.success})
        }
    },'json')
    e.preventDefault()
})

window.addEventListener('load', () => {
    const search = $('#search')
    const closeBtn = $('#closeBtn')
    
    search.on('keyup', () => {
        let data = search.val()
        $.get(`${book_url}/app/search.php`,{search:data},response => {
            if(response){    
                $('.books').html(response);    

            }
    })
})

    closeBtn.on('click', () => {
        search.val('')
    })
   
})


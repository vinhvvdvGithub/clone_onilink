
async function addData(chooseString, user_id, id) {

    // Buoc 1:
    
    const url = "themes/altum/assets/AjaxExecute/AddLink.php";

    const url_link = "http://localhost/package/product/link/";


    const data = { chooseString: chooseString, user_id: user_id, id: id }
    const response = await fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json;charset=utf-8',
            'Accept': 'application/json;charset=UTF-8'
        },
        body: JSON.stringify(data)
    });

    // Buoc 2:
    const result = await response.json();

    location.replace(url_link + result);



}




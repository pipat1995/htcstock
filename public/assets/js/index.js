function checkQtyAccess(e) {
    getAccessoriesId(e.value).then(res => {
        console.log(res);
        // debugger
        document.getElementById('validationQty').value = res.qty
    })
}

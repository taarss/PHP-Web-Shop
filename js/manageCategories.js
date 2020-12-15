document.querySelector(".manageCategoriesBtn").onclick = e => {
    let catagories;
    let adp_underlay = document.createElement('div');
    adp_underlay.className = 'adp-underlay';
    document.body.appendChild(adp_underlay);
    let adp = document.createElement('div');
    adp
    adp.setAttribute("class", "col-8 adp")
    adp.innerHTML = `
    <button class="adpBtn col-1 button bg-danger text-light border-0">X</button>
    <h3>Manage Categories</h3>
    <div class="manageCategoriesTable d-flex flex-wrap">
        <h4 class="col-3">Name</h4>
        <h4 class="col-3">Image</h4>
        <h4 class="col-3">Update/delete related products</h4>
        <h4 class="col-3">Options</h4>
    </div>
    `;
    $.ajax({
        url: 'getCategories.php',
        type: 'post',
        data: {
            "callFunc2": 1,
        },
        success: function(data) {
            JSON.parse(data).forEach(element => {
                let rowForm = document.createElement("form");
                rowForm.setAttribute("enctype", "multipart/form-data");
                let nameInput = document.createElement("input");
                nameInput.setAttribute("type", "text");
                nameInput.setAttribute("value", element["name"]);
                nameInput.setAttribute("class", "col-3 categoryNameUpdateInput");
                rowForm.appendChild(nameInput);
                let imageInput = document.createElement("input");
                imageInput.setAttribute("type", "file");
                imageInput.setAttribute("class", "col-3 categoryImageUpdateInput");
                rowForm.appendChild(imageInput);
                let radio1 = document.createElement("input");
                radio1.setAttribute("type", "radio");
                radio1.setAttribute("name", "updateDelete");
                radio1.setAttribute("value", 1);
                let label1 = document.createElement("label");
                label1.innerHTML = "yes";
                label1.setAttribute("class", "col-1");
                let radio2 = document.createElement("input");
                radio2.setAttribute("type", "radio");
                radio2.setAttribute("name", "updateDelete");
                radio2.setAttribute("value", 0);
                let label2 = document.createElement("label");
                label2.innerHTML = "no";
                label2.setAttribute("class", "col-2");
                radio2.setAttribute("checked", "checked");
                rowForm.appendChild(radio1);
                rowForm.appendChild(label1);
                rowForm.appendChild(radio2);
                rowForm.appendChild(label2);
                let saveChangesInput = document.createElement("input");
                saveChangesInput.setAttribute("type", "submit");
                saveChangesInput.setAttribute("class", "col-1");
                rowForm.appendChild(saveChangesInput);
                rowForm.setAttribute("class", "col-12");
                let deleteData = document.createElement("button");
                deleteData.innerHTML = "delete";
                deleteData.setAttribute("class", "col-1 border border-dark bg-danger text-white");
                rowForm.appendChild(deleteData);
                let categoryId = document.createElement("p");
                categoryId.innerHTML = element["id"];
                categoryId.style.visibility = "hidden";
                categoryId.style.position = "absolute";
                categoryId.setAttribute("class", "categoryId");
                rowForm.appendChild(categoryId);
                rowForm.addEventListener('submit', function(){
                    updateAllProducts(this.querySelector(".categoryId").innerHTML, 
                    this.querySelector(".categoryNameUpdateInput").value,
                    this.querySelector('input[name = "updateDelete"]:checked').value, 
                    this.querySelector(".categoryImageUpdateInput").value)
                    ;
                });
                document.querySelector(".manageCategoriesTable").appendChild(rowForm);
            });
        }
    });
    
    function updateAllProducts(id, name,productRealtion, icon) {
        console.log(productRealtion);
            $.ajax({
                
                url: 'updateCategory.php',
                type: 'post',
                data: {
                    "id": id,
                    "productRelation": productRealtion,
                    "name": name,
                    "icon": icon
                },
                success: function(data) { 
                    console.log(data);
                }
            });    
    }



    document.body.appendChild(adp);
    document.querySelector(".adpBtn").onclick = e => {
        e.preventDefault();
        document.body.removeChild(adp_underlay);
        document.body.removeChild(adp);
    }

}
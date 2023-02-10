
    var atBody = $('#admin-table tbody')
    atBody.addEventListener("load", loadAdmins())

    function htmlAdminRow(name, category, originalPrice, salePrice, image) {
      var row = `<tr>
    <td>${name}</td>
    <td>${category}</td>
    <td>${originalPrice}</td>
    <td>${salePrice}</td>
    <td><img src="${image}"></img></td> </tr>`;
      return row;
    }


    function loadAdmins() {
      const xhr = new XMLHttpRequest();

      xhr.open('GET', '/get-admins', true);

      xhr.onload = function() {
        var adminList = JSON.parse(this.responseText);
        tbodyInnerHTML = "";
        for (key in adminList) {
          admin = adminList[key];
          adminRow = htmlAdminRow(products.name,products.category,products.originalPrice,products.salePrice,products.image);
          tbodyInnerHTML += adminRow;
        }
        atBody.html(tbodyInnerHTML);
      }

      xhr.send();
    }
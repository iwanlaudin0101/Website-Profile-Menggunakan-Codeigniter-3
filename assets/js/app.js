function createSlug() {
    let title = $('#title').val();
    $('#slug').val(string_to_slug(title));
}

function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, '');
    str = str.toLowerCase();

    // hapus aksen, tukar ñ dengan n, dll
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to = "aaaaeeeeiiiioooouuuunc------";
    for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');

    return str;
}

function getDataDesa() {
    let dataDesa = document.getElementById("import").value;
    let select = document.getElementById("from");
    const xml = new XMLHttpRequest();
    xml.onload = function () {
        if (this.status === 200) {
            const data = JSON.parse(this.responseText);
            select.textContent = "";
            select.insertAdjacentHTML('beforeend', `<option value="" selected="selected">--pilih--</option>`);
            data.forEach(element => {
                select.insertAdjacentHTML('beforeend', `<option value="${element.id}">${element.name}</option>`);
            });
        } else {
            alert('Data tidak ditemukan');
        }
    }

    const url = 'http://127.0.0.1/HMTernate/anggota/getDataId/' + dataDesa;
    xml.open('GET', url, true);
    xml.send();
}
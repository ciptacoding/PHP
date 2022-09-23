const keyword = document.getElementById("search");
const btnSearch = document.getElementById("btnSearch");
const container = document.getElementById("tableContainer");

keyword.addEventListener("keyup", function () {
  // buat object ajax
  const xhr = new XMLHttpRequest();

  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  // eksekusi ajax
  xhr.open("GET", "ajax/book.php?keyword=" + keyword.value, true);
  xhr.send();
});

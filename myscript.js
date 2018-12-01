var box = document.getElementById("feed-stuff-container");
box.style.display = "none";

function showPostBox() {
    if (box.style.display === "none") {
        box.style.display = "block";
    } else {
        box.style.display = "none";
    }
}
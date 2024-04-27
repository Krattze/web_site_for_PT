var count = 0;
document.getElementById("my_btn").onclick = function () {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src = "https://www.meme-arsenal.com/memes/24c960c0f705783251c4519a09e72aab.jpg"
        document.getElementById("demo").appendChild(img);
    }

}
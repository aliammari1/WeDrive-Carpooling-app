const changeImage = () => {
  const input = document.createElement("input");
  input.type = "file";
  input.accept = "image/*";
  input.addEventListener("change", (event) => {
    const file = event.target.files[0];
    const imageUrl = URL.createObjectURL(file);
    const profileImage = document.getElementById("profile-image");
    profileImage.src = imageUrl;
    const request = new XMLHttpRequest();
    request.open(
      "POST",
      "../../../Controller/Users/ModifyProfilePicture.php",
      true
    );
    request.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
    request.onload = () => {
      if (request.status === 200) {
        console.log(request.responseText);
      }
    };
    console.log("profileImage=" + imageUrl);
    request.send("profileImage=" + encodeURIComponent(imageUrl));
  });
  // Click the file input element to open the file selector
  input.click();
};

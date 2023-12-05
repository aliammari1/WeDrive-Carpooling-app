const changeImage = () => {
  const input = document.createElement("input");
  input.type = "file";
  input.accept = "image/*";

  input.addEventListener("change", async (event) => {
    const file = event.target.files[0];
    const imageUrl = URL.createObjectURL(file);
    const profileImage = document.getElementById("profile-image");
    profileImage.src = imageUrl;

    try {
      const response = await fetch("../../../Controller/Users/ModifyProfilePicture.php", {
        method: "POST",
        body: new FormData().append("profileImage", file),
      });

      if (response.ok) {
        console.log(await response.text());
      }
    } catch (error) {
      console.error(error);
    }
  });

  input.click();
};

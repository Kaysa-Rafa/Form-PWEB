document.addEventListener("DOMContentLoaded", function() {
  const body = document.body;
  const themeButton = document.createElement("button");
  themeButton.className = "theme-toggle";
  themeButton.textContent = "🌍 Overworld";
  document.body.appendChild(themeButton);

  let currentTheme = "overworld";

  themeButton.addEventListener("click", function() {
    if (currentTheme === "overworld") {
      currentTheme = "nether";
      body.className = "nether";
      themeButton.textContent = "🔥 Nether";
      themeButton.style.borderColor = "#ff3300";
      themeButton.style.color = "#ff3300";
      themeButton.style.textShadow = "0 0 8px #ff3300";
    } else if (currentTheme === "nether") {
      currentTheme = "end";
      body.className = "end";
      themeButton.textContent = "💜 End";
      themeButton.style.borderColor = "#cc66ff";
      themeButton.style.color = "#cc66ff";
      themeButton.style.textShadow = "0 0 8px #cc66ff";
    } else {
      currentTheme = "overworld";
      body.className = "overworld";
      themeButton.textContent = "🌍 Overworld";
      themeButton.style.borderColor = "#00ff66";
      themeButton.style.color = "#00ff99";
      themeButton.style.textShadow = "0 0 8px #00ff66";
    }
  });
});

document.addEventListener("scroll", function () {
  const stackContainer = document.querySelector(".stack-container");

  function isElementVisible(element) {
    return element.offsetWidth > 0 && element.offsetHeight > 0;
  }

  function getVisibleStackContainer() {
    return isElementVisible(stackContainer) ? stackContainer : null;
  }

  function adjustStackContainerSize() {
    const visibleStackContainer = getVisibleStackContainer();
    const viewportHeight = window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;
    const scrollPosition = window.scrollY + viewportHeight;

    if (!visibleStackContainer) {
      stackContainer.style.transform = "scale(1)";
      return;
    }

    const stackContainerRect = visibleStackContainer.getBoundingClientRect();

    if (scrollPosition >= documentHeight) {
      stackContainer.style.height = "100vh";
    } else {
      stackContainer.style.height = "auto";
    }
  }
});

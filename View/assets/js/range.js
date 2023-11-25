(function () {
  const parent = document.querySelector('.range-slider')
  if (!parent) return

  const rangeS = parent.querySelectorAll('input[type=range]')
  const numberS = parent.querySelectorAll('input[type=number]')

  rangeS.forEach(function (el) {
    el.oninput = function () {
      let slide1 = parseFloat(rangeS[0].value)
      let slide2 = parseFloat(rangeS[1].value)

      if (slide1 > slide2) {
        [slide1, slide2] = [slide2, slide1]
        // var tmp = slide2;
        // slide2 = slide1;
        // slide1 = tmp;
      }

      numberS[0].value = slide1
      numberS[1].value = slide2
    }
  })

  numberS.forEach(function (el) {
    el.oninput = function () {
      const number1 = parseFloat(numberS[0].value)
      const number2 = parseFloat(numberS[1].value)

      if (number1 > number2) {
        const tmp = number1
        numberS[0].value = number2
        numberS[1].value = tmp
      }

      rangeS[0].value = number1
      rangeS[1].value = number2
    }
  })
})()

const getData = async () => {
  const res = await fetch('http://food-science.tokyo/wp-json/wp/v2/food') // Promiseオブジェクト
  console.log(res)
  const foods = await res.json() // JSONデータとして取得する
  
  console.log(foods)

  let foodHtml = ''
  foods.forEach( food => {
    const html = `
      <div>
        <h3>${food.title.rendered}</h3>
        <p>${food.price}円</p>
      </div>
    `
    foodHtml += html
  } )

  const foodList = document.querySelector('#food-list')
  foodList.insertAdjacentHTML('beforeend', foodHtml)
}
getData()
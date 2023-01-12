const calcOrderTotal = items => _.reduce(items, (sum, {price = 0}) => sum + price, 0);
const printTotal = total => {
  let str = 'Стоимость заказа: ';
  if (total > 0) {
    str += `${total} руб.`;
  } else {
    str += 'Бесплатно';
  }

  return str;
}
const printOrderTotal = responseString => {
  const parsedJson = JSON.parse(responseString);
  const total = calcOrderTotal(parsedJson);
  console.log(printTotal(total));
}

printOrderTotal('[{"name": "Product 1", "price": 100.10}, {"name": "Product 2"}]');

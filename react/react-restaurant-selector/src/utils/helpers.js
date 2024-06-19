export function getObjectById (objects, id) {
  return objects.find(obj => obj.id == id)
}

export async function fetchRandomInt () {
  try {
    const response = await fetch(
      'https://www.random.org/integers/?num=1&min=0&max=8&col=1&base=10&format=plain&rnd=new'
    )
    if (response.status === 200) {
      const text = await response.text()
      const randomInt = text.trim()
      return randomInt
    } else {
      throw new Error('Failed to fetch the random integer')
    }
  } catch (error) {
    console.error('Error:', error)
    return null
  }
}

export function getRandomInt (min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min)
}

export function saveDailyValue (text) {
  const existingDataJSON = localStorage.getItem('previousChooses')
  let existingData = existingDataJSON ? JSON.parse(existingDataJSON) : []

  const currentDate = new Date()
  const year = currentDate.getFullYear()
  const month = String(currentDate.getMonth() + 1).padStart(2, '0')
  const day = String(currentDate.getDate()).padStart(2, '0')
  const formattedDate = `${year}.${month}.${day}`

  const newResult = {
    date: formattedDate,
    restaurant: text
  }

  existingData.push(newResult)

  localStorage.setItem('previousChooses', JSON.stringify(existingData))
}

export async function fetchRandomRestaurant(restaurants, setGeneratedRestaurant, setLoading) {
  setLoading(true);
  try {
    const randomInt = await fetchRandomInt();
    const restaurant = getObjectById(restaurants, randomInt);
    setGeneratedRestaurant(restaurant);
  } catch (error) {
    console.error('Error fetching restaurant:', error);
  } finally {
    setLoading(false);
  }
}

export function handleSelectAnotherRestaurant(
  spinCount,
  maxSpin,
  setSpinCount,
  fetchRestaurantFn,
  setTooChoosy
) {
  if (spinCount < maxSpin) {
    setSpinCount(prevCount => prevCount + 1);
    fetchRestaurantFn();
  } else {
    saveDailyValue("Túl finnyás voltál :(");
    setTooChoosy(true);
  }
}

export function handleSaveSelection(generatedRestaurant, setAcceptedSpin) {
  setAcceptedSpin(generatedRestaurant.name);
  saveDailyValue(generatedRestaurant.name);
}
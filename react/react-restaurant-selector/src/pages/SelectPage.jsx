import { useCallback, useContext, useEffect, useState } from 'react'
import { fetchRandomRestaurant } from '../utils/helpers'
import { AppContext } from '../contexts/AppContext'
import LoaderUI from '../components/LoaderUI'
import GeneratedRestaurantUI from '../components/GeneratedRestaurantUI'

export default function SelectPage () {
  const {
    maxSpin,
    restaurants,
    spinCount,
    setSpinCount,
    setAcceptedSpin,
    setTooChoosy,
    generatedRestaurant,
    setGeneratedRestaurant
  } = useContext(AppContext)

  const [loading, setLoading] = useState(true)

  const fetchRestaurant = useCallback(() => {
    fetchRandomRestaurant(restaurants, setGeneratedRestaurant, setLoading)
  }, [restaurants])

  useEffect(() => {
    fetchRestaurant()
    setSpinCount(prevCount => prevCount + 1)
  }, [fetchRestaurant, setSpinCount])

  useEffect(() => {
    if (spinCount > maxSpin) {
      setTooChoosy(true)
    }
  }, [spinCount, maxSpin])

  return (
    <div>
      {loading ? (
        <LoaderUI />
      ) : (
        <GeneratedRestaurantUI
          restaurant={generatedRestaurant}
          setAcceptedSpin={setAcceptedSpin}
          spinCount={spinCount}
          maxSpin={maxSpin}
          setSpinCount={setSpinCount}
          fetchRestaurant={fetchRestaurant}
          setTooChoosy={setTooChoosy}
        />
      )}
    </div>
  )
}

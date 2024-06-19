import React, { useContext, useEffect } from 'react'
import { AppContext } from '../contexts/AppContext'
import { Route, Routes, useLocation, useNavigate } from 'react-router-dom'
import TooPickyPage from '../pages/TooPickyPage'
import ResultPage from '../pages/ResultPage'
import SelectPage from '../pages/SelectPage'
import PreviousChoosesPage from '../pages/PreviousChoosesPage'
import HomePage from '../pages/HomePage'
import OutOfTimePage from '../pages/OutOfTimePage'
import PageNotFound from '../pages/PageNotFound'

export default function Gate () {
  const {
    tooChoosy,
    acceptedSpin,
    generatedRestaurant,
    timeRemaining,
    spinCount,
    setAcceptedSpin
  } = useContext(AppContext)
  const navigate = useNavigate()
  const location = useLocation()

  useEffect(() => {
    if (timeRemaining == '00:00:00') {
      navigate('/out-of-time')
    } else if (!acceptedSpin && !tooChoosy && spinCount === 0) {
      if (location.pathname === '/select-restaurant') {
        navigate('/select-restaurant')
      } else {
        navigate('/')
      }
    } else if (acceptedSpin) {
      navigate('/result')
    } else if (tooChoosy) {
      navigate('/toochoosy')
    }
  }, [setAcceptedSpin, tooChoosy, acceptedSpin, generatedRestaurant])

  return (
    <Routes>
      <Route path='/' element={<HomePage />} />
      <Route path='/toochoosy' element={<TooPickyPage />} />
      <Route path='/previous-chooses' element={<PreviousChoosesPage />} />
      <Route path='/result' element={<ResultPage />} />
      <Route path='/select-restaurant' element={<SelectPage />} />
      <Route path='/out-of-time' element={<OutOfTimePage />} />
      <Route path='*' element={<PageNotFound />} />
    </Routes>
  )
}

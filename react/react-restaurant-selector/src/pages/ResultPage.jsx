import { useContext } from 'react'
import { AppContext } from './../contexts/AppContext'
import ResultUI from '../components/ResultUI'

export default function ResultPage () {
  const { acceptedSpin } = useContext(AppContext)
  return <ResultUI selection={acceptedSpin} />
}

import { Route, BrowserRouter as Router, Routes } from 'react-router-dom';
import './index.css';

import Gate from './utils/Gate';
import PreviousChoosesPage from './pages/PreviousChoosesPage';

function App() {
  return (
    <Router>
      <Routes>
        <Route path='/*' element={<Gate />} />
        <Route path="/previous-chooses" element={<PreviousChoosesPage />} />
      </Routes>
    </Router>
  );
}

export default App;

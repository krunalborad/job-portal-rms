import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'
import { Suspense, lazy } from 'react'
import LoadingSpinner from './components/common/LoadingSpinner'

const Home = lazy(() => import('./pages/Home'))
const JobSearch = lazy(() => import('./pages/JobSearch'))
const JobDetail = lazy(() => import('./pages/JobDetail'))
const Dashboard = lazy(() => import('./pages/Dashboard'))
const RecruiterDashboard = lazy(() => import('./pages/RecruiterDashboard'))
const Login = lazy(() => import('./pages/Auth/Login'))
const Register = lazy(() => import('./pages/Auth/Register'))
const NotFound = lazy(() => import('./pages/NotFound'))

function App() {
  return (
    <Router>
      <Suspense fallback={<LoadingSpinner />}>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/jobs" element={<JobSearch />} />
          <Route path="/jobs/:id" element={<JobDetail />} />
          <Route path="/login" element={<Login />} />
          <Route path="/register" element={<Register />} />
          <Route path="/dashboard" element={<Dashboard />} />
          <Route path="/recruiter/dashboard" element={<RecruiterDashboard />} />
          <Route path="*" element={<NotFound />} />
        </Routes>
      </Suspense>
    </Router>
  )
}

export default App
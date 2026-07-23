import { Link } from 'react-router-dom'

export default function Home() {
  return (
    <div className="min-h-screen bg-white">
      <section className="bg-gradient-to-r from-indigo-600 to-blue-600 text-white py-20 px-4">
        <div className="max-w-7xl mx-auto text-center">
          <h1 className="text-5xl font-bold mb-6">Find Your Dream Job</h1>
          <p className="text-xl mb-8 text-indigo-100">Modern recruitment platform</p>
          <Link to="/jobs" className="btn btn-primary">Browse Jobs</Link>
        </div>
      </section>
    </div>
  )
}
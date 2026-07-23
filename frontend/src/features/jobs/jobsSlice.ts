import { createSlice } from '@reduxjs/toolkit'

const jobsSlice = createSlice({
  name: 'jobs',
  initialState: {
    jobs: [],
    loading: false,
    error: null,
  },
  reducers: {},
})

export default jobsSlice.reducer
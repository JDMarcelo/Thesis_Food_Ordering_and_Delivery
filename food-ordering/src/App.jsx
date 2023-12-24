import React from "react";
import AdminDashboard from "./admin/AdminDashboard";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
{
  /* <Router>
        <Routes>
          <Route path="/" element={<Home />} />
        </Routes>
      </Router> */
}
const App = () => {
  return (
    <div>
      <AdminDashboard />
    </div>
  );
};

export default App;

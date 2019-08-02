import React from 'react';
import Header from './sub-components/Header';
import Footer from './sub-components/Footer';
import SignupForm from './sub-components/SignupForm';

class Home extends React.Component {
  render() {
    return (
      <div>
        <Header />
        <SignupForm />
        <Footer />
      </div>
    )
  }
}


export default Home;
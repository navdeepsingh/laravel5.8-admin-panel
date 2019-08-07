import React from 'react';

class Footer extends React.Component {
  render() {
    return (
      <footer className="text-center py-2">
        <ul className="list-inline">
          <li className="list-inline-item"><a href="/terms">T&amp;C's</a></li>
          <li className="list-inline-item"><a href="/privacy-policy">Privacy Policy</a></li>
        </ul>
        <div>
          &copy; 2019 Brotzeit Singapore. All rights reserved.
            </div>

      </footer>
    )
  }
}


export default Footer;
import React from "react";
import Footer from './Footer';

class NotFoundPage extends React.Component {
    render() {
        return (
            <div>
                <p>Can't park there, Sir</p>
                <Footer />
            </div>
        )
    }
}

export default NotFoundPage;
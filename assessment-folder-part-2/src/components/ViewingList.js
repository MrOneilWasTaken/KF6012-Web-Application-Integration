import React from "react";
import Film from "./Film";
import CheckBox from "./CheckBox";

class ViewingList extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            results: [],
            viewinglist: []
        }
        console.log("constructed")
    }

    componentDidMount() {
        let url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week11/api/films"

        fetch(url)
            .then((response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then((data) => {
                this.setState({ results: data.results })

            })
            .catch((err) => {
                console.log("Something went wrong lad ", err)
            });

        // Second fetch request

        url = "http://localhost/webappinterface/KF6012-Web-Application-Integration/week11/api/viewinglist"

        let formData = new FormData();
        formData.append('token', localStorage.getItem('myViewingListToken'));

        fetch(url, {
            method: 'POST',
            headers: new Headers(),
            body: formData
        })
            .then((response) => {
                if (response.status === 200) {
                    return response.json()
                } else {
                    throw Error(response.statusText);
                }
            })
            .then((data) => {
                this.setState({ viewinglist: data.results })

            })
            .catch((err) => {
                console.log("Something went wrong lad ", err)
            });


    }



    render() {

        let results = this.state.results

        console.log("Rendered")

        return (
            <div>
                {results.map((film) => (
                    <div key={film.film_id}>
                        <CheckBox viewinglist={this.state.viewinglist} film_id={film.film_id} />
                        <Film film={film} />
                    </div>

                )
                )}
            </div>
        )
    }
}

export default ViewingList;
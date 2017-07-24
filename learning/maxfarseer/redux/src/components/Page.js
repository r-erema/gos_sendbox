/*
import React, { PropTypes, Component } from 'react';

export default class Page extends Component {
    onYearBtnClick(e) {
        this.props.setYear(+e.target.innerText);
    }
    render() {
        const { year, photos } = this.props;
        return <div>
            <p>
                <button onClick={::this.onYearBtnClick}>2016</button>
                <button onClick={::this.onYearBtnClick}>2015</button>
                <button onClick={::this.onYearBtnClick}>2014</button>
            </p>
            <h3>{year} year</h3>
            <p>You have {photos.length}</p>
        </div>;
    }
}

Page.propTypes = {
    year : PropTypes.number.isRequired,
    photos : PropTypes.array.isRequired,
    setYear : PropTypes.func.isRequired
};*/


import React, { PropTypes, Component } from 'react'

export default class Page extends Component {
    onYearBtnClick(e) {
        this.props.getPhotos(+e.target.innerText)
    }
    render() {
        const { year, photos, fetching } = this.props
        return <div className='ib page'>
            <p>
                <button className='btn' onClick={::this.onYearBtnClick}>2016</button>{' '}
                <button className='btn' onClick={::this.onYearBtnClick}>2015</button>{' '}
                <button className='btn' onClick={::this.onYearBtnClick}>2014</button>
            </p>
            <h3>{year} год</h3>
            {
                fetching ?
                    <p>Загрузка...</p>
                    :
                    <p>У тебя {photos.length} фото.</p>
            }
        </div>
    }
}

Page.propTypes = {
    year: PropTypes.number.isRequired,
    photos: PropTypes.array.isRequired,
    getPhotos: PropTypes.func.isRequired
}
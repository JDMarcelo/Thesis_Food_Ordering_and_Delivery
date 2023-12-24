import React from "react";

const AddProduct = () => {
  return (
    <div
      className="modal fade"
      id="staticBackdrop"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabIndex="-1"
      aria-labelledby="staticBackdropLabel"
      aria-hidden="true"
    >
      <div className="modal-dialog">
        <div className="modal-content">
          <div className="modal-header">
            <h1 className="modal-title fs-5" id="exampleModalLabel">
              Add Product
            </h1>
            <button
              type="button"
              className="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div className="modal-body">
            <form>
              <div className="mb-3">
                <label className="col-form-label">Product Name:</label>
                <input
                  type="text"
                  className="form-control"
                  id="productName-name"
                />
              </div>
              <div className="mb-3">
                <label className="col-form-label">Description:</label>
                <textarea
                  className="form-control"
                  id="description-text"
                ></textarea>
              </div>

              <div className="mb-3">
                <label className="col-form-label">Price:</label>
                <input type="text" className="form-control" id="price-name" />
              </div>

              <div className="mb-3">
                <label className="form-label">Image:</label>
                <input
                  className="form-control form-control-sm"
                  id="formFileSm"
                  type="file"
                />
              </div>
            </form>
          </div>
          <div className="modal-footer">
            <button
              type="button"
              className="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" className="btn btn-primary">
              Add Product
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default AddProduct;

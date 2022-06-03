import { TestBed } from '@angular/core/testing';

import { ApibuzonService } from './apibuzon.service';

describe('ApibuzonService', () => {
  let service: ApibuzonService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ApibuzonService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
